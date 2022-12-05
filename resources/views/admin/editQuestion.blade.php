@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <h1 class="text-center text-danger">Thông tin câu hỏi</h1>
        <form enctype="multipart/form-data" method="POST" action="{{ url('update-question/' . $question->questionid) }}">
            {{ csrf_field() }}
            @method('PUT')
            {{-- @foreach ($question as $question) --}}
            <div class="mb-3">
                <input type="hidden" name="questionid" placeholder="ID câu hỏi" value="{{ $question->questionid }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="content">Câu hỏi</label>
                <input type="text" name="content" id="content" value="{{ $question->content }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="answera">Đáp án A</label>
                <input type="text" name="answera" id="answera" value="{{ $question->answera }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="answerb">Đáp án B</label>
                <input type="text" name="answerb" id="answerb" value="{{ $question->answerb }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="answerc">Đáp án C</label>
                <input type="text" name="answerc" id="answerc" value="{{ $question->answerc }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="answerd">Đáp án D</label>
                <input type="text" name="answerd" id="answerd" value="{{ $question->answerd }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="correctanswer">Đáp án đúng</label>
                <input type="text" name="correctanswer" id="correctanswer" value="{{ $question->correctanswer }}"
                    class="form-control">
            </div>
            <div class="mb-3 mt-3">
                <label for="level" class="form-label">Độ khó</label>
                {{-- <input type="text" name="level" id="level" value="{{ $question->level }}" class="form-control"> --}}
                @if ($question->level == 'Dễ')
                    <select class="form-select" name="level" id="level">
                        <option value="Dễ" selected>Dễ</option>
                        <option value="Khá">Khá</option>
                        <option value="Khó">Khó</option>
                    </select>
                @elseif ($question->level == 'Khá')
                    <select class="form-select" name="level" id="level">
                        <option value="Dễ">Dễ</option>
                        <option value="Khá" selected>Khá</option>
                        <option value="Khó">Khó</option>
                    </select>
                @else
                    <select class="form-select" name="level" id="level">
                        <option value="Dễ">Dễ</option>
                        <option value="Khá">Khá</option>
                        <option value="Khó" selected>Khó</option>
                    </select>
                @endif
            </div>
            <div>
                <label for="image" class="form-label">Hình ảnh câu hỏi</label><br>
                <img src="images/{{ $question->image }}" alt="" style="width: 250px; height: 300px">
                <input type="file" class="form-control" id="fileUpload" name="fileUpload">
            </div>
            <div class="mb-3 mt-3">
                <label for="subjectid" class="form-label">Môn học</label>
                <select class="form-select" name="subjectid" id="subjectid">
                    @foreach ($subject as $sub)
                        <option value="{{ $sub->subjectid }}">{{ $sub->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            {{-- @endforeach --}}
            <button style="cursor: pointer;" type="submit" class="btn btn-primary" value="Cập nhật">Cập nhật</button>
        </form>
    </div>
@endsection
