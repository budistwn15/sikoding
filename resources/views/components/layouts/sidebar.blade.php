<div>
    <div class="mb-4">
        <small class="d-block text-secondary mb-2 text-uppercase">Dashboard</small>
        <div class="list-group">
            <a class="list-group-item list-group-item-action" href="{{ route('dashboard') }}">Dashboard</a>
          </div>
    </div>
@foreach ($navigations as $navigation)
@can($navigation->permission_name)
<div class="mb-4">
    <small class="d-block text-secondary mb-2 text-uppercase">{{ $navigation->name }}</small>
    <div class="list-group">
        @foreach ($navigation->children as $child)
            <a href="{{ url($child->url) }}" class="list-group-item list-group-item-action">{{ $child->name }}</a>
        @endforeach
      </div>
</div>
@endcan
@endforeach



<div class="mb-4">
    <small class="d-block text-secondary mb-2 text-uppercase">Logout</small>
    <div class="list-group">
        <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
         {{ __('Logout') }}
     </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
      </div>
</div>

</div>
