<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">User Management</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Главная</a>
            </li>
            @if(Auth::check() && Auth::user()->is_admin)
                <li class="nav-item">
                    <a class="nav-link" href="/admin/users">Управление пользователями</a>
                </li>
            @endif
        </ul>

        @if(Auth::check())
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/profile/{{Auth::user()->id}}" class="nav-link">Профиль</a>
                </li>
                <li class="nav-item">
                    <a href="/logout" class="nav-link" onclick="return confirm('Вы уверены что хотите выйти?')">Выйти</a>
                </li>
            </ul>
        @else
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/login" class="nav-link">Войти</a>
                </li>
                <li class="nav-item">
                    <a href="/reg" class="nav-link">Регистрация</a>
                </li>
            </ul>
        @endif
    </div>
</nav>