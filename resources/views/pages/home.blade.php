@extends('../layout')

@section('title', 'Home')

@section('main')
    <section>
        <form action="/questions" method="POST">
            @csrf
            <textarea name="question" placeholder="Enter your question here..."></textarea>
            <button type="submit">Ask</button>
        </form>
    </section>
    <hr />
    <section>
        <h1>Questions list</h1>
    </section>
@endsection
