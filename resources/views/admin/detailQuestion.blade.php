@extends('admin.layout')
@section('content')
    <a href="{{ route('index') }}" title="Back Question"><button class="btn btn-primary btn-sm m-3">Back</button></a>
    <div class="row mb-2 container-fluid">
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">ID câu hỏi: {{ $question->questionid }}</strong>
                    <h3 class="mb-0">{{ $question->content }}</h3>
                    <div class="col-auto d-none d-lg-block">
                        <img src="images/{{ $question->image }}" height="300" width="300">
                    </div>
                    <div class="mb-1 text-muted">
                        <ul class="">
                            <li>Đáp án A: {{ $question->answera }} </li>
                            <li>Đáp án B: {{ $question->answerb }}</li>
                            <li>Đáp án C: {{ $question->answerc }}</li>
                            <li>Đáp án D: {{ $question->answerd }}</li>
                        </ul>
                    </div>
                    <p class="text-boild">
                        Đáp án đúng: {{ $question->correctanswer }}
                    </p>
                    <div class="card-text mb-auto">Mức độ: {{ $question->level }} </div>
                    <div class="card-text mb-auto">Môn học: {{ $question->Subject->name }} </div>
                </div>

            </div>
        </div>
    @endsection
