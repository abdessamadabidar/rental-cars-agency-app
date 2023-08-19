<x-master title="recherche">
    <div class="container-fluid py-4 px-lg-4">
        <div class="row">
            <div class="col-12 col-lg-6">
                <section>
                    <div class="row gy-4">
                        @foreach($voitures as $voiture)
                            @php
                                $carImages =  $voiture->images();
                                $images = [];
                                if($carImages !== null) {
                                    $i = 0;
                                    foreach ($carImages as $path) {
                                        $images[$path] = !(boolean)$i++;
                                    }
                                }
                            @endphp
                            <x-car-card :voiture="$voiture" :images="$images"/>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-master>
