<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100" style="margin-top: 70px;">
        <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1" id="login-div">
                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>
                            <form wire:submit.prevent="login">
                                <div class="row">
                                    <div class="d-flex flex-row align-items-center mb-4">

                                        <div class="form-group form-outline flex-fill mb-0">
                                            <label class="form-label">Email :</label>
                                            <input type="text" wire:model="email" class="form-control">
                                            @error('email')
                                                <span class="text-danger error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">

                                        <div class="form-group form-outline flex-fill mb-0">
                                            <label class="form-label">Password :</label>
                                            <input type="password" wire:model="password" class="form-control">
                                            @error('password')
                                                <span class="text-danger error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button class="btn text-white btn-success" type="submit">Login</button>
                                    </div>
                                </div>
                            </form>
                            <div class="text-center align-items-center mb-4 mt-4">
                                Don't have account? <a class="btn btn-primary text-white"
                                    wire:click.prevent="register()"><strong>Register
                                        Here</strong></a>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                class="img-fluid" alt="Sample image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
