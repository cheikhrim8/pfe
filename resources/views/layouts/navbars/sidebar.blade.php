<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active" @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            {{--      Settings   this can only access by the admin     --}}
            @can('manage_users')
                <li>
                    <a data-toggle="collapse" href="#settings" aria-expanded="true">
                        <i class="fas fa-cog"></i>
                        <span class="nav-link-text">{{ __('Settings') }}</span>
                        <b class="caret mt-1"></b>
                    </a>
                    <div class="collapse" id="settings">
                        <ul class="nav pl-4">
                            <li @if ($pageSlug == 'profile') class="active " @endif>
                                <a href="{{ route('profile.edit')  }}">
                                    <i class="tim-icons icon-single-02"></i>
                                    <p>{{ __('User Profile') }}</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'users') class="active " @endif>
                                <a href="{{ route('users.index')  }}">
                                    <i class="tim-icons icon-bullet-list-67"></i>
                                    <p>{{ __('Users Management') }}</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan
            {{-- Discussions --}}
            <li @if ($pageSlug == 'forum') class="active " @endif>
                <a data-toggle="collapse" href="#discussions" aria-expanded="true">
                    <i class="fas fa-comments"></i>
                    <span class="nav-link-text">{{ __('Discussions') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="show collapse" id="discussions">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'all discussions') class="active " @endif>
                            <a href="{{ route('forum')  }}">
                                <i class="fas fa-commenting"></i>
                                <p>{{ __('All Discussions') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="/forum?filter=me">
                                <i class="fas fa-commenting"></i>
                                <p>{{ __('My Discussion') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('users.index')  }}">
                                <i class="fas fa-check"></i>
                                <p>{{ __('Answered Discussions') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('users.index')  }}">
                                <i class="fas fa-times"></i>
                                <p>{{ __('Non Answered Discussions') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- <li @if ($pageSlug == '') class="active " @endif>
                 <a href="/forum?filter=me">
                     <i class="fas fa-book-open"></i>
                     <p>{{ __('My Discussions') }}</p>
                 </a>
             </li>
             <li @if ($pageSlug == 'answered-discussion') class="active " @endif>
                 <a href="/forum?filter=solved">
                     <i class="fas fa-book-open"></i>
                     <p>{{ __('Answered Discussions') }}</p>
                 </a>
             </li>
             <li @if ($pageSlug == 'answered-discussion') class="active " @endif>
                 <a href="d/forum?filter=unsolved">
                     <i class="fas fa-book-open"></i>
                     <p>{{ __('Answered Discussions') }}</p>
                 </a>
             </li>--}}

            {{--Channels--}}

            <li>
                <a data-toggle="collapse" href="#channels" aria-expanded="true">
                    <i class="fas fa-tv"></i>
                    <span class="nav-link-text">{{ __('Channels') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="channels">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'All Channels') class="active " @endif>
                            <a href="{{route('channels.index')}}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('All channels') }}</p>
                            </a>
                        </li>
                        @can('instructor')
                            <li @if ($pageSlug == 'my channels') class="active " @endif>
                                <a href="{{ route('channels.index')  }}">
                                    <i class="tim-icons icon-bullet-list-67"></i>
                                    <p>{{ __('My Channels') }}</p>
                                </a>
                            </li>
                        @endcan
                        <li @if ($pageSlug == 'abonner') class="active " @endif>
                            <a href="{{ route('channels.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Channels Abonner') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>
