@extends('layouts.app')

@section('title', 'Vessel Purchase / Sale Inquiry - SMA Ship Brokers')
@section('description', 'Submit your vessel purchase or sale inquiry to our team of maritime experts.')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="fade-in">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6">Vessel Purchase / Sale Inquiry</h1>
                    <p class="text-xl opacity-90 max-w-2xl mx-auto">
                        Submit your vessel requirements and our maritime experts will get back to you with the best solutions.
                    </p>
                </div>
            </div>
        </div>
    </section>

    

    <!-- CTA Section -->
    <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-3xl font-bold mb-4">Need Immediate Assistance?</h2>
                <p class="text-lg mb-6 opacity-90">
                    Contact our maritime experts directly for urgent inquiries.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="tel:+1234567890" class="bg-white text-primary-color font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition-colors">
                        <i class="fas fa-phone mr-2"></i>
                        Call Now
                    </a>
                    <a href="mailto:info@globaltradehub.com" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary-color transition-colors">
                        <i class="fas fa-envelope mr-2"></i>
                        Email Us
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const form = document.querySelector('form');
    const requiredFields = form.querySelectorAll('[required]');
    
    form.addEventListener('submit', function(e) {
        let isValid = true;
        
        // Check required fields
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('border-red-500');
                isValid = false;
            } else {
                field.classList.remove('border-red-500');
            }
        });
        
        // Check if at least one inquiry type is selected
        const inquiryTypes = form.querySelectorAll('input[name="inquiry_type"]');
        const inquiryTypeSelected = Array.from(inquiryTypes).some(radio => radio.checked);
        
        if (!inquiryTypeSelected) {
            alert('Please select an inquiry type.');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
        }
    });
    
    // Real-time validation
    requiredFields.forEach(field => {
        field.addEventListener('blur', function() {
            if (!this.value.trim()) {
                this.classList.add('border-red-500');
            } else {
                this.classList.remove('border-red-500');
            }
        });
        
        field.addEventListener('input', function() {
            if (this.value.trim()) {
                this.classList.remove('border-red-500');
            }
        });
    });
});
</script>
@endpush
