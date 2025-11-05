// Extracted from: pages/reviews.php

const reviewsData = [
    {
        title: "Toxic Swamp Of Office Politics",
        role: "Lorem Ipsum Dolor Sit Amet Dummy Text Lorem",
        meta: "(Former Employee) · USA · OCTOBER 3, 2023",
        rating: 5,
        text: "Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer...",
        helpfulYes: 18,
        helpfulNo: 12
    },
    {
        title: "Toxic Swamp Of Office Politics",
        role: "Lorem Ipsum Dolor Sit Amet Dummy Text Lorem",
        meta: "(Former Employee) · USA · OCTOBER 3, 2023",
        rating: 4,
        text: "Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer...",
        helpfulYes: 8,
        helpfulNo: 3
    }
    ];

    // Calculate rating summary
    const totalReviews = reviewsData.length;
    const avgRating = (reviewsData.reduce((a, c) => a + c.rating, 0) / totalReviews).toFixed(1);
    document.getElementById('avgRating').innerText = avgRating;
    document.getElementById('totalReviews').innerText = `${totalReviews} Reviews`;

    // Generate rating bars
    const ratingCount = [5, 4, 3, 2, 1].map(r => reviewsData.filter(v => v.rating === r).length);
    const ratingBars = document.getElementById('ratingBars');
    ratingCount.forEach((count, i) => {
    const percent = (count / totalReviews) * 100;
    ratingBars.innerHTML += `
        <div class="rating-bar">
        <div class="bar-label">${5 - i}</div>
        <div class="bar"><div class="bar-fill" style="width:${percent}%;"></div></div>
        </div>`;
    });

    // Generate reviews
    const reviewsContainer = document.getElementById('reviewsContainer');
    reviewsData.forEach(r => {
    reviewsContainer.innerHTML += `
    <div class="review-card">
        <div class="review-header">${'★'.repeat(r.rating)}<span class="stars">${'☆'.repeat(5 - r.rating)}</span></div>
        <div class="review-title">${r.title}</div>
        <div class="review-meta">${r.role}<br>${r.meta}</div>
        <div class="review-text">${r.text.repeat(2)}</div>
        <div class="review-helpful">Was This Review Helpful?</div>
        <div class="review-actions">
        <button class="btn">Yes (${r.helpfulYes})</button>
        <button class="btn active">No (${r.helpfulNo})</button>
        </div>
    </div>`;
    });