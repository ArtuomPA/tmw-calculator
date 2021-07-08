@extends("layout")

@section("title")
Мои билды
@endsection

@section("main-content")
      <section>
         <article>
            <h2>Список сохранённых билдов</h2>
            
            @auth
                @foreach ($builds as $build)
                <br>
                <div class="border border-info rounded">
                	<h3>{{$build["title"]}}</h3>
                	<p>{{$build["description"]}}</p>
                	<form id="logout-form" action="/delete/{{$build['id']}}" method="POST">
                		<a href="/build/{{$build['id']}}" class="btn btn-success">Открыть</a>
                        {{ csrf_field() }}
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                </div>
                @endforeach
            @else
            	<p>Войдите, чтобы увидеть список ваших билдов.</p>
            @endauth
            
         </article>
      </section>
@endsection