@if(session()->has('success'))
    <div class="flashbag-master" id="flashbagMaster">
        <x-master-alert type="success">
            {{session('success')}}
        </x-master-alert>
    </div>
@endif

<script>
    let flashbagMaster = document.getElementById('flashbagMaster');

    setTimeout(function (){
        flashbagMaster.classList.add('d-none');
    }, 2000);
</script>


