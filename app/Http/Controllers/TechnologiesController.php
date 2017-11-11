<?php

namespace Portfolio\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Portfolio\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Portfolio\Http\Requests\TechnologyCreateRequest;
use Portfolio\Http\Requests\TechnologyUpdateRequest;
use Portfolio\Repositories\TechnologyRepository;
use Portfolio\Validators\TechnologyValidator;

class TechnologiesController extends Controller {

    /**
     * @var TechnologyRepository
     */
    protected $repository;

    /**
     * @var TechnologyValidator
     */
    protected $validator;

    public function __construct(TechnologyRepository $repository, TechnologyValidator $validator) {

        $this->repository = $repository;
        $this->validator = $validator;

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $technologies = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $technologies,
            ]);
        }

        return view('technologies.index', compact('technologies'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TechnologyCreateRequest $request
     *
     * @return Response
     */
    public function store(TechnologyCreateRequest $request) {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $technology = $this->repository->create($request->all());

            $response = [
                'message' => 'Technology created.',
                'data'    => $technology->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {

        $technology = $this->repository->find($id);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $technology,
            ]);
        }

        return view('technologies.show', compact('technology'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {

        $technology = $this->repository->find($id);

        return view('technologies.edit', compact('technology'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TechnologyUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(TechnologyUpdateRequest $request, $id) {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $technology = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Technology updated.',
                'data'    => $technology->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {

        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {
            return response()->json([
                'message' => 'Technology deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Technology deleted.');

    }

}
