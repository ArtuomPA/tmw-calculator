<!DOCTYPE html>
<html>
	<head>
      	<meta charset="utf-8">
      	<title>@yield("title")</title>
      
      	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container py-3">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
              	<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 link-secondary">Главная</a></li>
                    <li><a href="/my-builds" class="nav-link px-2 link-dark">Мои билды</a></li>
                    <li><a href="/faq" class="nav-link px-2 link-dark">Чаво</a></li>
                    <li><a href="/about" class="nav-link px-2 link-dark">О нас</a></li>
              	</ul>
        		
        		@auth
                <div class="col-md-3 text-end">
                	<form id="logout-form" action="{{ url('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <ul class="nav flex-row-reverse">
                            <li><button class="btn btn-primary" type="submit">Выйти</button></li>
                            <li><p class="nav-link link-secondary">{{ Auth::user()->name }}</p></li>
                        </ul>
                    </form>
                </div>
                @else
          		<div class="col-md-3 text-end">
                    <a href="/login" type="button" class="btn btn-outline-primary me-2">Вход</a>
                    <a href="/register" type="button" class="btn btn-primary">Регистрация</a>
              	</div>
              	@endauth
            </header>

        	@yield("main-content")

            <footer class="pt-4 my-md-5 pt-md-5 border-top">
                <div class="row">
                      <div class="col-6 col-md">
                            <h5>Основные ссылки</h5>
                            <ul class="list-unstyled text-small">
                                  <li class="mb-1"><a class="link-secondary text-decoration-none" href="/">Главная</a></li>
                                  <li class="mb-1"><a class="link-secondary text-decoration-none" href="/my-builds">Мои билды</a></li>
                                  <li class="mb-1"><a class="link-secondary text-decoration-none" href="/faq">Чаво</a></li>
                                  <li class="mb-1"><a class="link-secondary text-decoration-none" href="/about">О нас</a></li>
                            </ul>
                      </div>
                </div>
                
                <script
        			  src="https://code.jquery.com/jquery-3.6.0.min.js"
        			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        			  crossorigin="anonymous">
    			</script>
    			
    			@yield("specific-scripts")
    			
        	</footer>
    	</div>
   	</body>
</html>