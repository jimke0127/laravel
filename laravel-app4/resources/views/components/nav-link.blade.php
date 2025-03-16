<!--1. 这里首先将 request()->is('/') 改成一个变量 例如 `active`-->
<!--2. 然后呢通过组件上将 active 变量传递进来是不是就可以了呢？-->
<!--3. 所以这里我们需要使用一个blade模板指令props -->

@props(['active' => false])

<a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" {{ $attributes }}>{{ $slot }}</a>