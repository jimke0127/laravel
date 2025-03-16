<x-layout>
  <x-slot:header>个人资料</x-slot:header>
  <h1>这是个人信息页面</h1>

  <div class="text-xl">个人信息列表</div>
  <ul>
    @foreach($profiles as $profile)
    <li class="mt-2">
      {{ $profile['name']}}
      <a class="ml-10 text-indigo-600" href="/profile/detail/{{$profile['id']}}">详情</a>
    </li>
    @endforeach
  </ul>
</x-layout>