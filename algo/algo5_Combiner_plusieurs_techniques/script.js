let videos = [
    {titre: "A", duree: 3, views: 2500},
    {titre: "B", duree: 2, views: 3000},
    {titre: "C", duree: 5, views: 1800},
    {titre: "D", duree: 4, views: 2200},
    {titre: "E", duree: 1, views: 1500}
];

let populaires = [];

for(let i = 0; i < videos.length; i++){
    if(videos[i].views >= 2000){
        populaires.push(videos[i]);
    }
}

for(let i = 0; i < populaires.length; i++){
    for(let j = i + 1; j < populaires.length; j++){

        if(populaires[i].duree > populaires[j].duree){

            let temp = populaires[i];
            populaires[i] = populaires[j];
            populaires[j] = temp;
        }
    }
}

let temps = 0;
let videosChoisies = [];

for(let i = 0; i < populaires.length; i++){

    if(temps + populaires[i].duree <= 10){

        videosChoisies.push(populaires[i]);
        temps = temps + populaires[i].duree;
    }
}

console.log(videosChoisies);
console.log("Nombre de vidéos : " + videosChoisies.length);
console.log("Temps total : " + temps + " minutes");