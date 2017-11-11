<?php

namespace Portfolio\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Portfolio\Http\Requests;
use Portfolio\Packages\Settings\SettingsObject;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Portfolio\Http\Requests\SiteSettingCreateRequest;
use Portfolio\Http\Requests\SiteSettingUpdateRequest;
use Portfolio\Repositories\SiteSettingRepository;
use Portfolio\Validators\SiteSettingValidator;


class SiteSettingsController extends Controller {

    /**
     * @var SiteSettingRepository
     */
    protected $repository;

    /**
     * @var SiteSettingValidator
     */
    protected $validator;

    public function __construct(SiteSettingRepository $repository, SiteSettingValidator $validator) {

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
        $siteSettings = $this->repository->all();

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $siteSettings,
            ]);
        }

        return view('siteSettings.index', compact('siteSettings'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SiteSettingCreateRequest $request
     *
     * @return Response
     */
    public function store(SiteSettingCreateRequest $request) {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $siteSetting = $this->repository->create($request->all());

            $response = [
                'message' => 'SiteSetting created.',
                'data' => $siteSetting->toArray(),
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

        $siteSetting = $this->repository->find($id);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $siteSetting,
            ]);
        }

        return view('siteSettings.show', compact('siteSetting'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {

        $siteSetting = $this->repository->find($id);

        return view('siteSettings.edit', compact('siteSetting'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SiteSettingUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(SiteSettingUpdateRequest $request, $id) {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $siteSetting = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'SiteSetting updated.',
                'data' => $siteSetting->toArray(),
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
                'message' => 'SiteSetting deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'SiteSetting deleted.');

    }

}
