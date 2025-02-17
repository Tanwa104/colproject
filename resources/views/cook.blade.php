@extends('layout.master')
@section('container')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="container-xxl bg-white p-0">
                <div class="container-xxl py-5 bg-dark hero-header mb-5">
                    <div class="container my-5 py-5">
                        <div class="row align-items-center g-5">
                            <div class="col-lg-6 text-center text-lg-start">
                                <h1 class="display-3 text-white animated slideInLeft">Karvae<br>Ghar ki seva</h1>
                                <p class="text-white animated slideInLeft mb-4 pb-2">Your everyday needs, expertly handled.
                                    Home services, simplified. Connecting you with top-rated pros. Get things done, the easy way.
                                    Trusted professionals, at your service.</p>
        
                            </div>
                            <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                                <img class="img-fluid" src="img/hero.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Enter</h5>
                <h1 class="mb-5">The given details</h1>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">


                        
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
                <div class="col-md-6">
               
    <form method="GET" action="{{ route('udcook.build') }}">
            
        <!-- Select type of cooking -->
        <div class="mb-3">
            <label for="occasion" class="form-label">Enter the type of cooking</label>
            <select name="occasion" id="occasion" class="form-control">
                <option> select</option>
                <option value="normal">Day to day cooking</option>
                <option value="special">Small occasion</option>
            </select>
        </div>

        <!-- Number of people -->
        <div class="mb-3">
            <label for="peopleno" class="form-label">Enter the number of people you have</label>
            <input type="number" name="peopleno" id="peopleno" class="form-control" required/>
        </div>

        <!-- Cuisine type -->
        <div class="mb-3">
            <label for="cus" class="form-label">Enter the type of cuisine</label>
            <select name="cus" id="cus" class="form-control">
                <option> select</option>
                <option value="normal">Indian</option>
                <option value="multi">Multicuisine</option>
            </select>
        </div>

        <!-- Number of meals to prepare -->
        <div class="mb-3">
            <label for="meals" class="form-label">Enter the number of meals you want to prepare</label>
            <input type="number" name="meals" id="meals" class="form-control" required/>
        </div>

        <!-- Dynamic meal descriptions -->
        <div id="mealDescriptionContainer" class="mb-3"></div>

        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
</div>

<script>
    // Listen for input change in the 'meals' field to generate textareas dynamically
    document.getElementById('meals').addEventListener('input', function() {
        const numMeals = parseInt(this.value);
        const container = document.getElementById('mealDescriptionContainer');
        container.innerHTML = ''; // Clear any previous textareas

        if (numMeals > 0) {
            for (let i = 1; i <= numMeals; i++) {
                // Create a label for each textarea
                const label = document.createElement('label');
                label.setAttribute('for', `mealDesc${i}`);
                label.innerText = `Description for Meal ${i}:`;

                // Create the textarea
                const textarea = document.createElement('textarea');
                textarea.setAttribute('name', `mealDescription[${i}]`); // Name to capture as an array
                textarea.setAttribute('id', `mealDesc${i}`);
                textarea.setAttribute('rows', '5');
                textarea.setAttribute('cols', '40');
                textarea.setAttribute('placeholder', `eg paneer pulav for lunch ,mention meal name and food name`);
                textarea.classList.add('form-control');

                // Append label and textarea to the container
                container.appendChild(label);
                container.appendChild(textarea);
                container.appendChild(document.createElement('br')); // Add a line break after each textarea
            }
        }
    });
</script>

</div>
</div>
</div>
</div>
    @endsection