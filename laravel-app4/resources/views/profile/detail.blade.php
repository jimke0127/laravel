<x-layout>
  <x-slot:header>个人资料</x-slot:header>
  <h1>这是个人信息详情页面</h1>

  <div class="text-xl">详情</div>
  <ul>
    <li class="mt-2">姓名: {{ $profile['name']}} - {{ $redisname}}</li>
    <li class="mt-2">年龄：{{ $profile['age']}}</li>
    <li class="mt-2">地址：{{ $profile['address']}}</li>
    <li class="mt-2">个人简介：{{ $profile['info']}}</li>
  </ul>
</x-layout>