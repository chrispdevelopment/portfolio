<?php

namespace Portfolio\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Portfolio\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Portfolio\Http\Requests\ProjectCreateRequest;
use Portfolio\Http\Requests\ProjectUpdateRequest;
use Portfolio\Repositories\ProjectRepository;
use Portfolio\Validators\ProjectValidator;

class ProjectsController extends Controller {

    /**
     * @var ProjectRepository
     */
    protected $repository;

    /**
     * @var ProjectValidator
     */
    protected $validator;

    /**
     * ProjectsController constructor.
     *
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator) {

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
        $projects = $this->repository->all();

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $projects,
            ]);
        }

        return view('projects.index', compact('projects'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectCreateRequest $request
     *
     * @return Response
     */
    public function store(ProjectCreateRequest $request) {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $project = $this->repository->create($request->all());

            $response = [
                'message' => 'Project created.',
                'data'    => $project->toArray(),
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

        $project = $this->repository->find($id);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $project,
            ]);
        }

        return view('projects.show', compact('project'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {

        $project = $this->repository->find($id);

        return view('projects.edit', compact('project'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(ProjectUpdateRequest $request, $id) {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $project = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Project updated.',
                'data'    => $project->toArray(),
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
                'message' => 'Project deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Project deleted.');

    }

}
