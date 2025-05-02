<div>
    <!-- Reviews Summary -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center gap-6">
            <!-- Average Rating -->
            <div class="text-center md:text-left md:pr-6 md:border-r md:border-gray-200">
                <div class="text-5xl font-bold text-gray-900">{{ $product->average_rating }}</div>
                <div class="flex text-yellow-400 mr-2">
                    @for ($i = 0; $i < 5; $i++)
                        @if (floor($product->average_rating) - $i >= 1)
                            <i class="fas fa-star"></i>
                        @elseif ($product->average_rating - $i > 0)
                            <i class="fas fa-star-half-alt"></i>
                        @else
                            <i class="far fa-star text-gray-300"></i>
                        @endif
                    @endfor
                </div>
                <div class="text-gray-500">Based on {{ $product->reviews->count() }} reviews</div>
            </div>

            <!-- Rating Breakdown -->
            <div class="flex-grow">
                @for($index = 1; $index <= 5; $index ++)
                    <div class="flex items-center mb-2">
                        <div class="w-12 text-sm text-gray-600">{{ (6 - $index) }} stars</div>
                        <div class="flex-grow mx-3">
                            <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-yellow-400 rounded-full"
                                     style="width: {{($product->reviews->where('rating', $index)->count() / $product->reviews->count()) * 100}}%"></div>
                            </div>
                        </div>
                        <div
                            class="w-8 text-sm text-gray-600 text-right">{{ $product->reviews->where('rating', $index)->count() }}</div>
                    </div>
                @endfor()
            </div>
        </div>
    </div>

    <!-- Reviews List -->
    <div class="space-y-6">
        @forelse($product->reviews as $review)
            <div class="border-b pb-6">
                <div class="flex items-start">
                    <div class="mr-4">
                        <div
                            class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 uppercase font-bold">{{ \Illuminate\Support\Str::take($review->reviewer_name, 2) }}</div>
                    </div>
                    <div class="flex-grow">
                        <div class="flex items-center mb-1">
                            <h4 class="font-medium mr-2">{{ $review->reviewer_name }}</h4>
                            <span class="text-gray-500 text-sm">{{ $review->created_at }}</span>
                            <span class="ml-2 bg-green-100 text-green-800 text-xs px-2 py-0.5 rounded-full">Verified Purchase</span>
                        </div>
                        <div class="flex text-yellow-400 mb-2">
                            @for ($i = 0; $i < 5; $i++)
                                @if (floor($review->rating) - $i >= 1)
                                    <i class="fas fa-star"></i>
                                @elseif ($review->rating - $i > 0)
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="far fa-star text-gray-300"></i>
                                @endif
                            @endfor
                        </div>
                        <p class="text-gray-700 mb-3">{{ $review->content }}</p>
                    </div>
                </div>
            </div>
        @empty
            <!-- Empty State -->
            <div x-show="filteredReviews.length === 0" class="text-center py-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 text-gray-400 mb-4">
                    <i class="far fa-comment-alt text-2xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-1">No reviews found</h3>
                <p class="text-gray-600"
                   x-text="activeFilter === 'all' ? 'Be the first to review this product!' : `No ${activeFilter}-star reviews yet.`"></p>
            </div>
        @endforelse
    </div>

    @auth

    <!-- Write a Review -->
    <div class="mt-10 border-t pt-8"  x-data="{
            hoverRating: 0,
      newReview: {
        name: '',
        email: '',
        rating: 0,
        title: '',
        comment: '',
        termsAccepted: false
      },

      get averageRating() {
        const sum = this.reviews.reduce((total, review) => total + review.rating, 0);
        return (sum / this.reviews.length).toFixed(1);
      },

      get totalReviews() {
        return this.reviews.length;
      },

      get ratingCounts() {
        const counts = [0, 0, 0, 0, 0]; // 5, 4, 3, 2, 1 stars
        this.reviews.forEach(review => {
          counts[5 - review.rating]++;
        });
        return counts;
      },

      get filteredReviews() {
        let filtered = [...this.reviews];

        // Apply star filter
        if (this.activeFilter !== 'all') {
          filtered = filtered.filter(review => review.rating === this.activeFilter);
        }

        // Apply sorting
        switch (this.sortOption) {
          case 'newest':
            filtered.sort((a, b) => new Date(b.date) - new Date(a.date));
            break;
          case 'oldest':
            filtered.sort((a, b) => new Date(a.date) - new Date(b.date));
            break;
          case 'highest':
            filtered.sort((a, b) => b.rating - a.rating);
            break;
          case 'lowest':
            filtered.sort((a, b) => a.rating - b.rating);
            break;
        }

        // Apply pagination
        const startIndex = (this.currentPage - 1) * this.itemsPerPage;
        const endIndex = startIndex + this.itemsPerPage;
        return filtered.slice(startIndex, endIndex);
      },

      get totalPages() {
        let filtered = [...this.reviews];
        if (this.activeFilter !== 'all') {
          filtered = filtered.filter(review => review.rating === this.activeFilter);
        }
        return Math.ceil(filtered.length / this.itemsPerPage);
      },

      get paginationArray() {
        const pages = [];
        if (this.totalPages <= 7) {
          for (let i = 1; i <= this.totalPages; i++) {
            pages.push(i);
          }
        } else {
          pages.push(1);

          if (this.currentPage > 3) {
            pages.push('...');
          }

          const start = Math.max(2, this.currentPage - 1);
          const end = Math.min(this.totalPages - 1, this.currentPage + 1);

          for (let i = start; i <= end; i++) {
            pages.push(i);
          }

          if (this.currentPage < this.totalPages - 2) {
            pages.push('...');
          }

          pages.push(this.totalPages);
        }
        return pages;
      },

      getStarClass(position, rating) {
        const roundedRating = Math.round(rating * 2) / 2;
        if (position <= roundedRating) {
          return 'fas fa-star';
        } else if (position - 0.5 === roundedRating) {
          return 'fas fa-star-half-alt';
        } else {
          return 'far fa-star';
        }
      },

      getInitials(name) {
        return name.split(' ').map(n => n[0]).join('').toUpperCase().substring(0, 2);
      },

      formatDate(dateString) {
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return new Date(dateString).toLocaleDateString('en-US', options);
      },

      async submitReview() {
        if (!this.newReview.rating || !this.newReview.comment || !this.newReview.name || !this.newReview.email) {
          alert('Please fill in all required fields and accept the terms and conditions.');
          return;
        }

        // In a real app, this would send the review to the server
        await fetch('/{{ $product->id }}/reviews', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector(`meta[name='csrf-token']`).getAttribute('content'),
            },
            body: JSON.stringify({
              name: this.newReview.name || 'Anonymous',
              email: this.newReview.email,
              rating: this.newReview.rating,
              comment: this.newReview.comment,
            })
        })

        // Show success message (in a real app)
        alert('Thank you for your review! It has been submitted successfully.');

        window.reload()
      }
        }">
        <h3 class="text-xl font-bold mb-6">Write a Review</h3>
        <form @submit.prevent="submitReview()">
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Your Rating</label>
                <div class="flex text-2xl text-gray-300">
                    <template x-for="i in 5" :key="i">
                        <button type="button" @click="newReview.rating = i" @mouseover="hoverRating = i"
                                @mouseleave="hoverRating = 0" class="focus:outline-none mr-1">
                            <i :class="(hoverRating || newReview.rating) >= i ? 'fas fa-star text-yellow-400' : 'far fa-star'"></i>
                        </button>
                    </template>
                </div>
            </div>

            <div class="mb-4">
                <label for="review-comment" class="block text-gray-700 font-medium mb-2">Review</label>
                <textarea id="review-comment" x-model="newReview.comment" rows="4"
                          class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600"
                          placeholder="What did you like or dislike about this product?"></textarea>
            </div>

            <div class="mb-6">
                <label for="review-name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                <input type="text" id="review-name" x-model="newReview.name"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600"
                       placeholder="Enter your name">
            </div>

            <div class="mb-6">
                <label for="review-email" class="block text-gray-700 font-medium mb-2">Your Email</label>
                <input type="email" id="review-email" x-model="newReview.email"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600"
                       placeholder="Enter your email (will not be published)">
            </div>

            <div>
                <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-3 rounded-md font-medium hover:bg-indigo-700 transition">
                    Submit Review
                </button>
            </div>
        </form>
    </div>
    @endauth

</div>
