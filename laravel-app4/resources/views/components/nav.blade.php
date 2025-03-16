<div {{ $attributes }}>
  <x-nav-link href="/" :active="request()->is('/')">首页</x-nav-link>
  <x-nav-link href="/profile" :active="request()->is('profile')">个人资料</x-nav-link>
  <x-nav-link href="/contact" :active="request()->is('contact')">联系方式</x-nav-link>
</div>