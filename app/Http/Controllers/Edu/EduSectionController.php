<?php

namespace App\Http\Controllers\Edu;

use App\Http\Requests\SectionRequest;
use App\Models\EduChapter;
use App\Models\EduDocument;
use App\Models\EduSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EduSectionController extends Controller
{
    protected $chapter;

    public function __construct(Request $request)
    {
        if ($chapter = $request->query('chapter_id')) {
            $this->chapter = EduChapter::findOrFail($chapter);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('edu.document.section_create', ['chapter' => $this->chapter]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        $section = EduSection::create($request->all());
        return redirect(route('edu.section.edit', [$section, 'chapter_id' => $this->chapter]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EduSection $eduSection
     * @return \Illuminate\Http\Response
     */
    public function show(EduSection $eduSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EduSection $eduSection
     * @return \Illuminate\Http\Response
     */
    public function edit(EduSection $section)
    {
        return view('edu.document.section_edit', ['section' => $section, 'chapter' => $this->chapter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\EduSection $eduSection
     * @return \Illuminate\Http\Response
     */
    public function update(SectionRequest $request, EduSection $section)
    {
        $section->update($request->all());
        return back()->with('success', '修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EduSection $eduSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(EduSection $eduSection)
    {
        //
    }
}
