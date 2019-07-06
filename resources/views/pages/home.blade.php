@extends('../layout')

@section('title', $title)

@section('main')
    <section>
        <form action="/questions" method="POST" id="form-question">
            @csrf
            <textarea name="body" placeholder="Enter your question here...">{{ old('body') }}</textarea>
            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit">Ask</button>
        </form>
    </section>
    <hr />
    <section>
        <h1>Questions list</h1>

        @foreach ($entries as $entry)
            <article>
                <h1>
                    <a href="/questions/{{ $entry['question']->id }}" title="{{ $entry['question']->body}}">
                        {{ $entry['question']->body }}
                        ({{ $entry['answers'] }} {{ $entry['answers'] < 2 ? 'answer' : 'answers' }})
                    </a>
                </h1>
            </article>
        @endforeach
    </section>
@endsection
