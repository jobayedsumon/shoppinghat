<div class="pr-0 @if(Route::currentRouteName() == 'home') shadow-sm" @else shadow-lg" id="category-sidebar" @endif>


        <div class="cnav">

            <ul class="menu menu-bar">
                <li>

                    <ul class="mmega-menu mmega-menu--multiLevel">

                    @foreach (\App\Models\Category::where('level', 0)->orderBy('order_level', 'desc')->get()->take(11) as $key => $category)
                        <li>
                            <a href="{{ route('products.category', $category->slug) }}" class="menu-link mmega-menu-link" aria-haspopup="true">{{ $category->getTranslation('name') }}</a>


                        @if(count(\App\Utility\CategoryUtility::get_immediate_children_ids($category->id))>0)
                            <ul class="menu menu-list">


                                @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($category->id) as $key => $first_level_id)
                                <li>
                                    <a href="{{ route('products.category', \App\Models\Category::find($first_level_id)->slug) }}" class="menu-link menu-list-link"
                                        aria-haspopup="true"> {{ \App\Models\Category::find($first_level_id)->getTranslation('name') }}</a>
                                       @if( count(\App\Utility\CategoryUtility::get_immediate_children_ids($first_level_id))>0)
                                    <ul class="menu menu-list">

                                        @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($first_level_id) as $key => $second_level_id)
                                        <li>
                                            <a href="{{ route('products.category', \App\Models\Category::find($second_level_id)->slug) }}" class="menu-link menu-list-link">{{ \App\Models\Category::find($second_level_id)->getTranslation('name') }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach

                            </ul>
                        @endif
                        </li>
                @endforeach




                    </ul>
                </li>

                <li>

            </ul>
        </nav>

    </div>
</div>




