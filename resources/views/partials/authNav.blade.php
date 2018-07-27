
<div class="links">
                    <a href="{{route('profile',['id'=>Auth::id()])}}">Профиль</a>
                    <a href="{{route('news.index')}}">Новости</a>
                    <a href="{{route('loginGoogle')}}" title="search people"><i class="fa fa-search" aria-hidden="true"></i> Поиск людей</a>
                    <a href="{{route('loginGitHub')}}" title="followers" class = "socialiteLogin"><i class="fa fa-followers" aria-hidden="true"></i> Мои подписчики</a>
                    <a href="{{route('logout')}}" title="exit">Выйти</a>
 </div>