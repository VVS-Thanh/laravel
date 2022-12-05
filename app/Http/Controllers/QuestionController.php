<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Question;
use App\Models\Subject;

class QuestionController extends Controller
{
    public function index()
    {
        $question = Question::paginate(10);;
        return view('admin/listquestion', compact('question'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function addQuestion()
    {
        $subject = Subject::all();
        return view('/admin/addQuestion', compact('subject'));
    }

    public function insertQuestion(Request $request)
    {

        $this->validate(request(), [
            'content' => 'required',
            'level' => 'required',
            'subjectid' => 'required'
        ]);
        $filename = "";
        if ($request->file('fileUpload')->isValid()) {
            $filename = $request->fileUpload->getClientOriginalName();
            $request->fileUpload->move('images/', $filename);
        }
        $question = Question::create([
            'questionid' => $request->id,
            'content' => $request->content,
            'answera' => $request->answera,
            'answerb' => $request->answerb,
            'answerc' => $request->answerc,
            'answerd' => $request->answerd,
            'correctanswer' => $request->correctanswer,
            'level' => $request->level,
            'subjectid' => $request->subjectid,
            'image' => $filename
        ]);

        $question = Question::paginate(9);
        return view('admin/listquestion', compact('question'));
    }


    public function getDetailQuestion($id)
    {
        $question = Question::where('questionid', $id)->first();
        return view('admin/detailQuestion', compact('question'));
    }

    public function editQuestion($id)
    {
        $subject = Subject::all();
        $question = Question::where('questionid', $id)->first();
        return view('admin/editQuestion', compact('question', 'subject'));
    }
    public function update(Request $request, $id)
    {

        $id = $request->input('questionid');
        $question = Question::where('questionid', $id)->first();
        $question->content = $request->input('content');
        $question->answera = $request->input('answera');
        $question->answerb = $request->input('answerb');
        $question->answerc = $request->input('answerc');
        $question->answerd = $request->input('answerd');
        $question->correctanswer = $request->input('correctanswer');
        $question->level = $request->level;
        if ($request->hasFile('fileUpload')) {
            $destionation = 'images/' . $question->image;
            if (File::exists($destionation)) {
                File::delete($destionation);
            }
            $filename = $request->fileUpload->getClientOriginalName();
            $request->fileUpload->move('images/', $filename);
        }
        $question->subjectid = $request->subjectid;
        $question->update();
        return view('admin/listquestion');

        // $id = $request->input('questionid');
        // $content = $request->input('content');
        // $answera = $request->input('answera');
        // $answerb = $request->input('answerb');
        // $answerc = $request->input('answerc');
        // $answerd = $request->input('answerd');
        // $correctanswer = $request->input('correctanswer');
        // $level = $request->level;
        // // if ($request->hasFile('fileUpload')) {
        // //     $destionation = 'images/' . $question->image;
        // //     if (File::exists($destionation)) {
        // //         File::delete($destionation);
        // //     }
        // //     $filename = $request->fileUpload->getClientOriginalName();
        // //     $request->fileUpload->move('images/', $filename);
        // // }
        // if ($request->hasFile('fileUpload')) {
        //     $image = time() . '.' . $request->image->extension();
        //     $request->image->move(public_path('images'), $image);
        // } else {
        //     $question = DB::select('SELECT image FROM molchoice.questions WHERE questionid = ?', [$id]);
        //     if ($question) {
        //         foreach ($question as $question) {
        //             $image = "$question->image";
        //         }
        //     }
        // }
        // $subjectid = $request->subjectid;
        // DB::update('UPDATE molchoice.questions set questionid = ?, content = ?,answera = ?,answerb = ?,
        // answerc = ?,answerd = ?,correctanswer = ?,level = ?,image = ?,subjectid = ? where questionid = ?', [$id, $content, $answera, $answerb, $answerc, $answerd, $correctanswer, $level, $image, $subjectid, $id]);
        // DB::commit();
    }
}