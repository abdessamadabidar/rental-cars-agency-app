@if(session()->has('success'))
    <div class="flashbag-master" id="flashbag">
        <x-alert type="success">
            {{session('success')}}
        </x-alert>
    </div>
@endif

<script>
    let flashbag = document.getElementById('flashbag');
    setTimeout(function (){
        flashbag.style.transition = " all 0.5s ease";
        flashbag.classList.add('d-none');

    }, 2000);
</script>


