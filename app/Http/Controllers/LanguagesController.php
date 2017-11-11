<?php

namespace Portfolio\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Portfolio\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Portfolio\Http\Requests\LanguageCreateRequest;
use Portfolio\Http\Requests\LanguageUpdateRequest;
use Portfolio\Repositories\LanguageRepository;
use Portfolio\Validators\LanguageValidator;

class LanguagesController extends Controller {

    /**
     * @var LanguageRepository
     */
    protected $repository;

    /**
     * @var LanguageValidator
     */
    protected $validator;

    public function __construct(LanguageRepository $repository, LanguageValidator $validator) {

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
        $languages = $this->repository->all();

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $languages,
            ]);
        }

        return view('languages.index', compact('languages'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LanguageCreateRequest $request
     *
     * @return Response
     */
    public function store(LanguageCreateRequest $request) {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $language = $this->repository->create($request->all());

            $response = [
                'message' => 'Language created.',
                'data' => $language->toArray(),
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

        $language = $this->repository->find($id);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $language,
            ]);
        }

        return view('languages.show', compact('language'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {

        $language = $this->repository->find($id);

        return view('languages.edit', compact('language'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LanguageUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(LanguageUpdateRequest $request, $id) {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $language = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Language updated.',
                'data' => $language->toArray(),
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
                'message' => 'Language deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Language deleted.');

    }

}
