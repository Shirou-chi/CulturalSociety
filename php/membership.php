<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CulturaNet | Membership</title>
    <link rel="stylesheet" href="/Assignment/css/membership.css">
    <?php
    include("navbar.php");
    include("preloader.php");
    ?>
</head>

<body>
    <main class="membership-page">
        <section class="membership-hero" aria-labelledby="membership-title">
            <div class="membership-hero__media">
                <img src="/Assignment/img/ba450dae7f7116da8fce8f3510662705.jpg" alt="Cultural event gathering">
            </div>
            <div class="membership-hero__overlay"></div>
            <div class="membership-hero__content">
                <p class="eyebrow">CulturaNet membership</p>
                <h1 id="membership-title">Unlock better access to every cultural experience.</h1>
                <p>
                    Choose a membership that fits how you explore. Save on tickets, enjoy event perks, and make every visit feel more connected.
                </p>
            </div>
            <div class="membership-hero__note">
                <strong>Member rewards</strong>
                <span>Discounts apply when purchasing eligible CulturaNet event tickets.</span>
            </div>
        </section>

        <section class="plans-section" aria-labelledby="plans-title">
            <div class="section-heading">
                <p class="eyebrow">Choose your access</p>
                <h2 id="plans-title">Simple plans for casual visitors and dedicated culture lovers.</h2>
            </div>

            <div class="plans-grid">
                <article class="plan-card">
                    <div class="plan-card__top">
                        <span class="plan-label">Starter</span>
                        <h3>Normal</h3>
                        <p class="plan-price">Free</p>
                        <p class="plan-summary">A practical plan for guests who want consistent savings on standard events.</p>
                    </div>
                    <ul class="benefit-list">
                        <li><ion-icon name="checkmark-circle-outline"></ion-icon>10% discount on ticket price</li>
                        <li><ion-icon name="checkmark-circle-outline"></ion-icon>5% discount on foods and beverages</li>
                        <li><ion-icon name="checkmark-circle-outline"></ion-icon>Access to standard events</li>
                        <li><ion-icon name="checkmark-circle-outline"></ion-icon>Community submission eligibility</li>
                    </ul>
                    <form id="normal-form" class="plan-form">
                        <button type="submit" id="normal-submit">Subscribe Normal</button>
                    </form>
                </article>

                <article class="plan-card plan-card--featured">
                    <div class="featured-badge">Most benefits</div>
                    <div class="plan-card__top">
                        <span class="plan-label">Premium</span>
                        <h3>VIP</h3>
                        <p class="plan-price">VIP</p>
                        <p class="plan-summary">Built for frequent visitors who want the best access, stronger savings, and premium event comfort.</p>
                    </div>
                    <ul class="benefit-list">
                        <li><ion-icon name="checkmark-circle-outline"></ion-icon>20% discount on ticket price</li>
                        <li><ion-icon name="checkmark-circle-outline"></ion-icon>Free foods and beverages</li>
                        <li><ion-icon name="checkmark-circle-outline"></ion-icon>Access to all events, including VIP</li>
                        <li><ion-icon name="checkmark-circle-outline"></ion-icon>VIP seats at selected music events</li>
                    </ul>
                    <form id="vip-form" class="plan-form">
                        <button type="submit" id="vip-submit">Subscribe VIP</button>
                    </form>
                </article>
            </div>
        </section>

        <section class="member-perks" aria-label="Membership benefits">
            <article>
                <ion-icon name="ticket-outline"></ion-icon>
                <h3>Event Savings</h3>
                <p>Use your member status to reduce eligible ticket costs and make more room for the next event.</p>
            </article>
            <article>
                <ion-icon name="restaurant-outline"></ion-icon>
                <h3>Food Benefits</h3>
                <p>Enjoy dining perks during events, from discounted refreshments to VIP food access.</p>
            </article>
            <article>
                <ion-icon name="sparkles-outline"></ion-icon>
                <h3>Better Access</h3>
                <p>VIP members receive broader event access and special seating opportunities when available.</p>
            </article>
        </section>

        <section class="membership-cta" aria-labelledby="membership-cta-title">
            <div>
                <p class="eyebrow">Ready when you are</p>
                <h2 id="membership-cta-title">Start with Normal, upgrade when culture becomes a habit.</h2>
            </div>
            <a href="/Assignment/php/event.php">Browse Events</a>
        </section>
    </main>

    <?php
    include("footer.php");
    ?>

    <script>
        function handleSubscription(formId, buttonId, planName) {
            document.getElementById(formId).addEventListener('submit', function(event) {
                event.preventDefault();
                const submitButton = document.getElementById(buttonId);
                submitButton.textContent = 'Subscribed';
                submitButton.disabled = true;
                submitButton.classList.add('subscribed');
                alert('You have subscribed to the ' + planName + ' membership!');
            });
        }

        handleSubscription('normal-form', 'normal-submit', 'Normal');
        handleSubscription('vip-form', 'vip-submit', 'VIP');
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
