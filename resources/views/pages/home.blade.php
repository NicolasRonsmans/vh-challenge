@extends('../layout')

@section('title', $title)

@section('main')
    <section class="list-group">
        <h1 class="h2 list-group-item bg-info text-white">Questions list</h1>
        @foreach ($questions as $question)
            <a href="/questions/{{ $question->id }}" title="{{ $question->body}}" class="list-group-item list-group-item-action d-flex align-items-start justify-content-between">
                {{ $question->body }}
                <span class="badge badge-info">{{ count($question->answers) }} {{ count($question->answers) < 2 ? 'answer' : 'answers' }}</span>
            </a>
        @endforeach
    </section>
    <hr />
    <section>
        <form action="/questions" method="POST" id="form-question">
            @csrf
            <div class="form-group">
                <textarea name="body" class="form-control @error('body') is-invalid @enderror" placeholder="{{ $placeholder }}">{{ old('body') }}</textarea>
                @error('body')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-info">Ask</button>
            </div>
        </form>
    </section>
@endsection
