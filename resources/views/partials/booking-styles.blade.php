<style>
    .text-theme {
        color: #d4a574 !important;
    }

    /* Progress Steps */
    .booking-progress {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
        padding: 40px 0;
    }

    .progress-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        position: relative;
        opacity: 0.4;
        transition: all 0.3s;
    }

    .progress-step.active {
        opacity: 1;
    }

    .step-number {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #e9ecef;
        color: #666;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: 700;
        transition: all 0.3s;
    }

    .progress-step.active .step-number {
        background: #d4a574;
        color: #fff;
        transform: scale(1.1);
        box-shadow: 0 5px 20px rgba(212, 165, 116, 0.4);
    }

    .step-label {
        font-size: 14px;
        font-weight: 600;
        color: #666;
        text-align: center;
    }

    .progress-step.active .step-label {
        color: #1a1a1a;
    }

    .progress-line {
        width: 80px;
        height: 2px;
        background: #e9ecef;
        position: relative;
        top: -20px;
    }

    /* Booking Form */
    .booking-form-wrapper {
        background: #fff;
        border-radius: 16px;
        padding: 50px;
        box-shadow: 0 15px 50px rgba(0,0,0,0.1);
    }

    .form-step {
        display: none;
        animation: fadeInUp 0.5s ease;
    }

    .form-step.active {
        display: block;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-step-title {
        font-size: 28px;
        color: #1a1a1a;
        margin-bottom: 15px;
        font-weight: 700;
    }

    .form-step-desc {
        font-size: 16px;
        color: #666;
        margin-bottom: 40px;
    }

    .form-label {
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 10px;
        font-size: 15px;
    }

    .form-control-lg {
        padding: 15px 20px;
        font-size: 16px;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        transition: all 0.3s;
    }

    .form-control-lg:focus {
        border-color: #d4a574;
        box-shadow: 0 0 0 0.2rem rgba(212, 165, 116, 0.15);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .form-text {
        color: #999;
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }

    /* Event Selector */
    .event-option {
        background: #fff;
        border: 3px solid #e9ecef;
        border-radius: 12px;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s;
        position: relative;
        height: 100%;
    }

    .event-option:hover {
        border-color: #d4a574;
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(212, 165, 116, 0.2);
    }

    .event-option.selected {
        border-color: #d4a574;
        background: rgba(212, 165, 116, 0.05);
    }

    .event-option-img {
        position: relative;
        height: 180px;
        overflow: hidden;
    }

    .event-option-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .event-option:hover .event-option-img img {
        transform: scale(1.05);
    }

    .event-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #d4a574;
        color: #fff;
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .event-option-details {
        padding: 20px;
    }

    .event-option-title {
        font-size: 18px;
        color: #1a1a1a;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .event-option-type {
        font-size: 13px;
        color: #d4a574;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .event-option-desc {
        font-size: 14px;
        color: #666;
        line-height: 1.6;
        margin: 0;
    }

    .event-option-check {
        position: absolute;
        top: 15px;
        right: 15px;
        width: 35px;
        height: 35px;
        background: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #d4a574;
        font-size: 20px;
        opacity: 0;
        transform: scale(0);
        transition: all 0.3s;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
    }

    .event-option.selected .event-option-check {
        opacity: 1;
        transform: scale(1);
    }

    /* Special Needs Checkboxes */
    .special-needs-checkboxes {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
    }

    .form-check-label {
        font-size: 15px;
        color: #666;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-check-input:checked {
        background-color: #d4a574;
        border-color: #d4a574;
    }

    /* Summary Cards */
    .booking-summary {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .summary-card {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 30px;
        border-left: 4px solid #d4a574;
    }

    .summary-card-title {
        font-size: 20px;
        color: #1a1a1a;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .summary-card-title i {
        color: #d4a574;
        font-size: 24px;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #dee2e6;
    }

    .summary-item:last-child {
        border-bottom: none;
    }

    .summary-label {
        font-weight: 600;
        color: #666;
        font-size: 15px;
    }

    .summary-value {
        color: #1a1a1a;
        font-size: 15px;
        font-weight: 500;
    }

    .terms-acceptance {
        background: #fff;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 20px;
    }

    .terms-acceptance .form-check-label {
        font-size: 14px;
        color: #666;
        line-height: 1.6;
    }

    .terms-acceptance a {
        text-decoration: underline;
    }

    /* Success Message */
    .success-icon {
        font-size: 80px;
        color: #28a745;
        animation: successPulse 1s ease;
    }

    @keyframes successPulse {
        0% {
            transform: scale(0);
            opacity: 0;
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .success-title {
        font-size: 32px;
        color: #1a1a1a;
        margin-bottom: 20px;
        font-weight: 700;
    }

    .success-text {
        font-size: 16px;
        color: #666;
        line-height: 1.8;
        margin-bottom: 10px;
    }

    .success-actions {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    /* Form Navigation */
    .form-navigation {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        padding-top: 30px;
        border-top: 2px solid #e9ecef;
    }

    .form-navigation .btn {
        padding: 15px 40px;
        font-size: 16px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        min-width: 180px;
    }

    .btn-prev {
        background: #6c757d;
        border-color: #6c757d;
    }

    .btn-prev:hover {
        background: #5a6268;
        border-color: #545b62;
    }

    /* Info Feature Cards */
    .info-feature-card {
        background: #fff;
        padding: 40px 30px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.3s;
    }

    .info-feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(212, 165, 116, 0.2);
    }

    .info-icon {
        width: 80px;
        height: 80px;
        background: rgba(212, 165, 116, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        font-size: 36px;
        color: #d4a574;
        transition: all 0.3s;
    }

    .info-feature-card:hover .info-icon {
        transform: scale(1.1);
        background: rgba(212, 165, 116, 0.2);
    }

    .info-title {
        font-size: 20px;
        color: #1a1a1a;
        margin-bottom: 15px;
        font-weight: 700;
    }

    .info-text {
        color: #666;
        line-height: 1.8;
        margin: 0;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .breadcumb-wrapper {
            padding: 120px 0 70px !important;
        }

        .booking-form-wrapper {
            padding: 35px;
        }

        .progress-line {
            display: none;
        }

        .booking-progress {
            gap: 15px;
        }

        .step-number {
            width: 50px;
            height: 50px;
            font-size: 20px;
        }

        .step-label {
            font-size: 12px;
        }
    }
    
    @media (max-width: 768px) {
        .breadcumb-wrapper {
            padding: 110px 0 60px !important;
        }
        
        .breadcumb-title {
            font-size: 36px !important;
        }

        .booking-form-wrapper {
            padding: 25px;
        }

        .form-step-title {
            font-size: 24px;
        }

        .form-navigation {
            flex-direction: column;
        }

        .form-navigation .btn {
            width: 100%;
        }

        .summary-item {
            flex-direction: column;
            gap: 8px;
        }

        .success-actions {
            flex-direction: column;
        }

        .success-actions .btn {
            width: 100%;
        }
    }
    
    @media (max-width: 576px) {
        .breadcumb-wrapper {
            padding: 100px 0 50px !important;
        }
        
        .breadcumb-title {
            font-size: 32px !important;
        }

        .booking-progress {
            padding: 20px 0;
        }

        .step-number {
            width: 45px;
            height: 45px;
            font-size: 18px;
        }

        .step-label {
            font-size: 11px;
        }

        .event-option-img {
            height: 150px;
        }

        .special-needs-checkboxes {
            flex-direction: column;
            gap: 15px;
        }
    }
</style>
