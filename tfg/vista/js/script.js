window.onload = function () {
    Array.from(document.getElementsByClassName("peliculaestreno")).map(
        m => m.addEventListener("click",
            function () {
                let expandirVideo = document.getElementById("video");
                //
                //SACO EL CODIGO DEL TRAILER DEL ALT DE LA IMAGEN
                //
                let nombreTrailer = this.querySelector("img").getAttribute("alt");

                expandirVideo.innerHTML = '<iframe id="trailer" src="https://www.youtube.com/embed/' + nombreTrailer + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

                let elemento = document.getElementById("videofondo");
                elemento.setAttribute("class", "videofondo");

                expandirVideo.style.display = "block";
            }
        ));

    document.getElementById("videofondo").addEventListener("click",
        function () {
            let expandirVideo = document.getElementById("video");

            expandirVideo.style.display = "none";
            document.getElementById("videofondo").setAttribute("class", "");

            //PARAR VIDEO
            let videoFrame = expandirVideo.querySelector("iframe");
            videoFrame.src = videoFrame.src;
        }
    );
}
