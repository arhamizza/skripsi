<div class="sidebar" data-color="black" data-active-color="success">
    <div class="logo">
        <a href="{{ route('page.index', '') }}" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="{{ route('page.index', '') }}" class="simple-text logo-normal">
            {{ __('Creative Tim') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'tabel' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'tabel') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('Tabel') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'alternatif' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'alternatif') }}">
                    <i class="nc-icon nc-hat-3"></i>
                    <p>{{ __('Alternatif') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'kriteria' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'kriteria') }}">
                    <i class="nc-icon nc-book-bookmark"></i>
                    <p>{{ __('Kriteria') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'guru' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'guru') }}">
                    <i class="nc-icon nc-book-bookmark"></i>
                    <p>{{ __('Guru') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'kelas' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'kelas') }}">
                    <i class="nc-icon nc-book-bookmark"></i>
                    <p>{{ __('Kelas') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'siswa' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'siswa') }}">
                    <i class="nc-icon nc-book-bookmark"></i>
                    <p>{{ __('Siswa') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'transaksiuser' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'transaksiguru_guru') }}">
                    <i class="nc-icon nc-book-bookmark"></i>
                    <p>{{ __('Transaksi') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                            {{ __('Laravel examples') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('UP') }}</span>
                                <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>
