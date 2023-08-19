<script>
    const ctx3 = document.getElementById("myChart3");

    const request3 = new XMLHttpRequest();
    request3.open("GET", "/number_of_visits_this_week", true);
    request3.send();

    const visits = [];

    request3.onload = function () {
        if(this.status === 200) {
            const numberOfVisits = JSON.parse(this.responseText).visits;
            for (const day in numberOfVisits) {
               visits.push(numberOfVisits[day]);
            }
        }


        new Chart(ctx3, {
            type: "line",
            data: {
                labels: ['Lundi', 'Mardi', "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"],
                datasets: [
                    {
                        label: "Le nombre de visites cette semaine",
                        fill: true,
                        borderColor: "#ff734f",
                        data: visits,
                        tension: 0.1,
                    },
                ],
            },
        });

    }

</script>

