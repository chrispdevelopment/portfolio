<?php

namespace Portfolio\Http\Controllers;

//use Illuminate\Http\Request;

use Illuminate\Http\Response;
//use Portfolio\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Portfolio\Http\Requests\VariableTypeCreateRequest;
use Portfolio\Http\Requests\VariableTypeUpdateRequest;
use Portfolio\Repositories\VariableTypeRepository;
use Portfolio\Validators\VariableTypeValidator;

class VariableTypesController extends Controller {

    /**
     * @var VariableTypeRepository
     */
    protected $repository;

    /**
     * @var VariableTypeValidator
     */
    protected $validator;

    public function __construct(VariableTypeRepository $repository, VariableTypeValidator $validator) {

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
        $variableTypes = $this->repository->all();

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $variableTypes,
            ]);
        }

        return view('variableTypes.index', compact('variableTypes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VariableTypeCreateRequest $request
     *
     * @return Response
     */
    public function store(VariableTypeCreateRequest $request) {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $variableType = $this->repository->create($request->all());

            $response = [
                'message' => 'VariableType created.',
                'data' => $variableType->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error' => true,
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

        $variableType = $this->repository->find($id);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $variableType,
            ]);
        }

        return view('variableTypes.show', compact('variableType'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {

        $variableType = $this->repository->find($id);

        return view('variableTypes.edit', compact('variableType'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VariableTypeUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(VariableTypeUpdateRequest $request, $id) {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $variableType = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'VariableType updated.',
                'data' => $variableType->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error' => true,
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
                'message' => 'VariableType deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'VariableType deleted.');

    }
}
