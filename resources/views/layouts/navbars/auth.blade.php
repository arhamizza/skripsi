<div class="sidebar" data-color="black" data-active-color="success">
    <div class="logo">
        <a href="{{ route('page.index', 'home') }}" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="{{ route('page.index', 'home') }}" class="simple-text logo-normal">
            {{ __('Creative Tim') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard_admin') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'tabel' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'tabel_admin') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('tabel') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'alternatif' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'alternatif_admin') }}">
                    <i class="nc-icon nc-hat-3"></i>
                    <p>{{ __('Alternatif') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'kriteria' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'kriteria_admin') }}">
                    <i class="nc-icon nc-book-bookmark"></i>
                    <p>{{ __('Kriteria') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'kelas' || $elementActive == 'guru'|| $elementActive == 'kelas' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#guru">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                            {{ __('Data Sekolah') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="guru">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'guru' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'guru_admin') }}">
                                <span class="sidebar-mini-icon">{{ __('G') }}</span>
                                <span class="sidebar-normal">{{ __(' Guru ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'kelas' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'kelas_admin') }}">
                                <span class="sidebar-mini-icon">{{ __('K') }}</span>
                                <span class="sidebar-normal">{{ __(' Kelas ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'siswa' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'siswa_admin') }}">
                                <span class="sidebar-mini-icon">{{ __('S') }}</span>
                                <span class="sidebar-normal">{{ __(' Siswa ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'transaksi' || $elementActive == 'transaksi_guru' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#transaksiguru">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                            {{ __('Transaksi') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="transaksiguru">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'transaksi' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'transaksi_admin') }}">
                                <span class="sidebar-mini-icon">{{ __('T') }}</span>
                                <span class="sidebar-normal">{{ __(' Transaksi ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'transaksi_guru' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'transaksiguru_admin') }}">
                                <span class="sidebar-mini-icon">{{ __('TG') }}</span>
                                <span class="sidebar-normal">{{ __(' Transaksi Guru ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'usermanagement' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                            {{ __('User Management') }}
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
                        <li class="{{ $elementActive == 'usermanagement' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'usermanagement') }}">
                                <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


        </ul>
    </div>
</div>
