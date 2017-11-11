<?php

namespace Portfolio\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Portfolio\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Portfolio\Http\Requests\ProjectImageCreateRequest;
use Portfolio\Http\Requests\ProjectImageUpdateRequest;
use Portfolio\Repositories\ProjectImageRepository;
use Portfolio\Validators\ProjectImageValidator;

class ProjectImagesController extends Controller {

    /**
     * @var ProjectImageRepository
     */
    protected $repository;

    /**
     * @var ProjectImageValidator
     */
    protected $validator;

    public function __construct(ProjectImageRepository $repository, ProjectImageValidator $validator) {

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
        $projectImages = $this->repository->all();

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $projectImages,
            ]);
        }

        return view('projectImages.index', compact('projectImages'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectImageCreateRequest $request
     *
     * @return Response
     */
    public function store(ProjectImageCreateRequest $request) {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $projectImage = $this->repository->create($request->all());

            $response = [
                'message' => 'ProjectImage created.',
                'data'    => $projectImage->toArray(),
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

        $projectImage = $this->repository->find($id);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $projectImage,
            ]);
        }

        return view('projectImages.show', compact('projectImage'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {

        $projectImage = $this->repository->find($id);

        return view('projectImages.edit', compact('projectImage'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectImageUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(ProjectImageUpdateRequest $request, $id) {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $projectImage = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ProjectImage updated.',
                'data'    => $projectImage->toArray(),
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
                'message' => 'ProjectImage deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProjectImage deleted.');

    }
}
