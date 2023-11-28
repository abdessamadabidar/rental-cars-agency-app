{{-- Modal --}}
<div
    class="modal fade"
    id="staticBackdrop"
    data-mdb-backdrop="static"
    data-mdb-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    Biographie
                </h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div
                class="modal-body px-md-5 d-flex align-items-center"
            >
                <div
                    class="row shadow-lg border-0 rounded-4 align-items-center justify-content-center w-100 g-0"
                >
                    <div class="col-12 h-100 col-md-4">
                        <div class="img-container">
                            <img
                                src="{{ asset('images/abdessamad_abidar.jpg') }}"
                                alt=""
                            />
                            <span class="cap-icon">
                                <img
                                    src="{{ asset('images/icons8-graduation-cap.svg') }}"
                                    alt=""
                                />
                            </span>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 mt-md-5 mb-5">
                        <div class="px-4 ps-md-0 d-flex flex-column align-items-center">
                            <div class="border-bottom w-100 d-flex flex-column align-items-center align-items-md-start pb-3">
                                <h4 class="h4 text-capitalize fst-italic">abdessamad abidar</h4>
                                <span class="text-uppercase colored small">engineering student</span>
                            </div>
                            <p class=" lead pt-3 text-center text-md-start text-dark">
                                Hello reader! My name is Abdessamad Abidar, I'm 21 years old, I'm passionately pursuing my journey in my second year as a software engineering student at <strong> ENSAH </strong>.
                                I am immersing myself in the world of software engineering, learning and gaining invaluable knowledge in both theory and practice.
                                I have honed my skills in various programming languages such as C, C++, and Java, utilizing them in the realm of problem-solving. I have a modest experience in web development
                                using both front-end and back-end technologies, as well as frameworks.
                                Additionally, my knowledge extends to version control systems like Git, enabling seamless collaboration on projects.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
