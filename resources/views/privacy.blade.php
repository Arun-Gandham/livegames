<x-app-layout>
    <x-slot name="header">
        <h1>Privacy Policy</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <div class="card col-md-12 mb-4">
                    <div class="card-body border-success shadow-lg p-4">
                        <h4 class="mb-4 text-success">Your Privacy Matters</h4>
                        <section class="mb-4">
                            <h5 class="fw-bold text-danger">1. Data Collection</h5>
                            <p>We only collect the minimum information required to provide you with our services. This may include your name, email address, and any messages you send us.</p>
                        </section>
                        <section class="mb-4">
                            <h5 class="fw-bold text-danger">2. Data Usage</h5>
                            <p>Your data is used strictly for service delivery. <span class="fw-bold text-success">We do not use, sell, or share your data for any other purpose.</span></p>
                        </section>
                        <section class="mb-4">
                            <h5 class="fw-bold text-danger">3. Data Security</h5>
                            <p>All information is stored securely and access is strictly limited. We use industry-standard security practices to protect your data.</p>
                        </section>
                        <section class="mb-4">
                            <h5 class="fw-bold text-danger">4. Compliance</h5>
                            <p>We comply with all relevant privacy standards and regulations, including GDPR and local laws.</p>
                        </section>
                        <section class="mb-4">
                            <h5 class="fw-bold text-danger">5. Your Rights</h5>
                            <ul class="list-group mb-2">
                                <li class="list-group-item">You can request deletion of your data at any time.</li>
                                <li class="list-group-item">You can access and review your information.</li>
                                <li class="list-group-item">You can contact us for any privacy concerns.</li>
                            </ul>
                        </section>
                        <div class="alert alert-success mt-3 fw-bold">Your data is safe, private, and handled as per the highest standards. We will never misuse your information.</div>
                        <p>If you have any questions or concerns about your privacy, please <a href="{{ route('contact') }}" class="text-danger fw-bold">contact us</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
