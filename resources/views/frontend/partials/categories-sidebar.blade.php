<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>All departments</span>
    </div>
    <ul @if(\Route::current()->getName() != 'home') style="display:none;" @endif>

        @foreach($categories as $category)
            <li><a href="#">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>