@if(session()->has('success'))
<div class="flashbag-main" id="flashbagMain">
    <x-main-alert type="success">
        {{session('success')}}
    </x-main-alert>
</div>
@endif

<script>
    let flashbagMain = document.getElementById('flashbagMain');
    setTimeout(function (){
        flashbagMain.classList.add('d-none');
    }, 2000);
</script>


