<title>Home</title>
<div class="bg-[#192734]">
    <div class="flex">
        @include('layouts.sidebar')
        <div class="w-3/5 border border-gray-600 h-auto  border-t-0">
            <div class="flex">
                <div class="flex-1 m-2">
                    <h2 class="px-4 py-2 text-xl font-semibold text-white">Home</h2>
                </div>
                <div class="flex-1 px-4 py-2 m-2">
                    <a href=""
                        class=" text-2xl font-medium rounded-full text-white hover:bg-[#192734] hover:text-blue-300 float-right">
                        <svg class="m-2 h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <g>
                                <path
                                    d="M22.772 10.506l-5.618-2.192-2.16-6.5c-.102-.307-.39-.514-.712-.514s-.61.207-.712.513l-2.16 6.5-5.62 2.192c-.287.112-.477.39-.477.7s.19.585.478.698l5.62 2.192 2.16 6.5c.102.306.39.513.712.513s.61-.207.712-.513l2.16-6.5 5.62-2.192c.287-.112.477-.39.477-.7s-.19-.585-.478-.697zm-6.49 2.32c-.208.08-.37.25-.44.46l-1.56 4.695-1.56-4.693c-.07-.21-.23-.38-.438-.462l-4.155-1.62 4.154-1.622c.208-.08.37-.25.44-.462l1.56-4.693 1.56 4.694c.07.212.23.382.438.463l4.155 1.62-4.155 1.622zM6.663 3.812h-1.88V2.05c0-.414-.337-.75-.75-.75s-.75.336-.75.75v1.762H1.5c-.414 0-.75.336-.75.75s.336.75.75.75h1.782v1.762c0 .414.336.75.75.75s.75-.336.75-.75V5.312h1.88c.415 0 .75-.336.75-.75s-.335-.75-.75-.75zm2.535 15.622h-1.1v-1.016c0-.414-.335-.75-.75-.75s-.75.336-.75.75v1.016H5.57c-.414 0-.75.336-.75.75s.336.75.75.75H6.6v1.016c0 .414.335.75.75.75s.75-.336.75-.75v-1.016h1.098c.414 0 .75-.336.75-.75s-.336-.75-.75-.75z">
                                </path>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <hr class="border-gray-600">
            <div class="flex">
                <form id="post-form">
                    @csrf
                    <div class="flex flex-shrink-0 p-4 pb-0">
                        <a href="#" class="flex-shrink-0 group block">
                            <div class="flex items-center">
                                <div>
                                    <img class="inline-block h-10 w-10 rounded-full" src="https://pbs.twimg.com/profile_images/1121328878142853120/e-rpjoJi_bigger.png" alt="">
                                </div>
                                <div class="ml-3">
                                    <p class="text-base leading-6 capitalize font-medium text-white">
                                        {{Auth::user()->name}} 
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="flex-1 px-2 pt-2 mt-2">
                        <textarea id="content" name="content" class=" bg-transparent text-gray-400 font-medium text-lg w-full rounded"
                            rows="2" cols="50" placeholder="What's happening?"></textarea>
                    </div>
            </div>
            <div class="flex mb-5 mr-10">
                <div class="flex-1">
                    <button type="submit"
                        class="bg-blue-400 mt-5 hover:bg-blue-600 text-white font-bold py-2 px-8 rounded-full mr-8 float-right">
                        Tweet
                    </button>
                </div>
                </form>
            </div>
            <hr class="border-gray-600 border-1">
            <div>
            </div>
            <div id="posts-container">
                <ul id="posts" class="posts">
                    <!-- posts here -->
                </ul>
            </div>
            
        </div>

        <div class="w-2/5 h-12">
            <!--right menu-->

            <div class="relative text-gray-300 w-80 p-5 pb-0 mr-16">
                <button type="submit" class="absolute ml-4 mt-3 mr-4">
                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px"
                        y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                        xml:space="preserve" width="512px" height="512px">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </button>

                <input type="search" name="search" placeholder="Search Twitter"
                    class="bg-[#192734] h-10 px-10 pr-5 w-full rounded-full text-sm focus:outline-none bg-purple-white shadow rounded border-0">

            </div>


            <div class="max-w-sm rounded-lg bg-[#192734] overflow-hidden shadow-lg m-4 mr-20">
                <div class="flex">
                    <div class="flex-1 m-2">
                        <h2 class="px-4 py-2 text-xl w-48 font-semibold text-white">Germany trends</h2>
                    </div>
                    <div class="flex-1 px-4 py-2 m-2">
                        <a href=""
                            class=" text-2xl rounded-full text-white hover:bg-[#192734] hover:text-blue-300 float-right">
                            <svg class="m-2 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                @for ($i = 0; $i < 5; $i++)
                    <hr class="border-gray-600">

                    <!--first trending tweet-->
                    <div class="flex">
                        <div class="flex-1">
                            <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400">1 . Trending</p>
                            <h2 class="px-4 ml-2 w-48 font-bold text-white">#Microsoft363</h2>
                            <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">5,466 Tweets</p>

                        </div>
                        <div class="flex-1 px-4 py-2 m-2">
                            <a href=""
                                class=" text-2xl rounded-full text-gray-400 hover:bg-[#192734] hover:text-blue-300 float-right">
                                <svg class="m-2 h-5 w-5" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endfor

                <hr class="border-gray-600">
                <div class="flex">
                    <div class="flex-1 p-4">
                        <h2 class="px-4 ml-2 w-48 font-bold text-blue-400">Show more</h2>
                    </div>
                </div>

            </div>


            <!--third-people suggetion to follow section-->

            <div class="max-w-sm rounded-lg bg-[#192734] overflow-hidden shadow-lg m-4 mr-20">
                <div class="flex">
                    <div class="flex-1 m-2">
                        <h2 class="px-4 py-2 text-xl w-48 font-semibold text-white">Who to follow</h2>
                    </div>
                </div>


                <hr class="border-gray-600">

                <!--first person who to follow-->
                @foreach ($users as $user)
                    <div class="flex flex-shrink-0">
                        <div class="flex-1 ">
                            <div class="flex items-center w-48">
                                <div>
                                    <img class="inline-block h-10 w-auto rounded-full ml-4 mt-2"
                                        src="https://pbs.twimg.com/profile_images/1121328878142853120/e-rpjoJi_bigger.png"
                                        alt="" />
                                </div>
                                <div class="ml-3 mt-3">
                                    <p class="text-base leading-6 capitalize font-medium text-white">
                                        {{ $user->name }}
                                    </p>
                                    <p
                                        class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ '@' . str_replace(' ', '', $user->name) }}
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="flex-1 px-4 py-2 m-2">
                            <a href="" class=" float-right">
                                <button
                                    class="bg-transparent hover:bg-blue-500 text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded-full follow-button"
                                    data-user-id="{{ $user->id }}">
                                    Follow
                                </button>

                            </a>

                        </div>
                    </div>
                    <hr class="border-gray-600">
                @endforeach
                <div class="flex">
                    <div class="flex-1 p-4">
                        <h2 class="px-4 ml-2 w-48 font-bold text-blue-400">Show more</h2>
                    </div>
                </div>
            </div>
            <div class="flow-root m-6 inline">
                <div class="flex-1">
                    <a href="#">
                        <p class="text-sm leading-6 font-medium text-gray-500">Terms Privacy Policy Cookies Imprint Ads
                            info</p>
                    </a>
                </div>
                <div class="flex-2">
                    <p class="text-sm leading-6 font-medium text-gray-600"> © {{ date('Y') }} Twitter, Inc.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    const followButtons = document.querySelectorAll('.follow-button');

    // Add click event listeners to all follow buttons
    followButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault(); // prevent the default form submission behavior

            const userId = button.dataset.userId;
            const followUrl = `{{ route('follow', ':userId') }}`.replace(':userId', userId);
            const unfollowUrl = `{{ route('unfollow', ':userId') }}`.replace(':userId', userId);
            const isFollowing = button.classList.contains('bg-blue-500');

            // Send Ajax request to follow or unfollow the user
            fetch(isFollowing ? unfollowUrl : followUrl, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        userId: userId,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    // Update the follow button and its text
                    button.classList.toggle('bg-blue-500');
                    button.textContent = isFollowing ? 'Follow' : 'Following';
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });

    const unfollowButtons = document.querySelectorAll('.unfollow-button');

    // Add click event listeners to all unfollow buttons
    unfollowButtons.forEach(button => {
        button.addEventListener('click', () => {
            const userId = button.dataset.userId;
            const unfollowUrl = `{{ route('unfollow', ':userId') }}`.replace(':userId', userId);

            // Send Ajax request to unfollow the user
            fetch(unfollowUrl, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        userId: userId,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update the UI to reflect the change
                        button.classList.remove('bg-blue-500');
                        button.classList.add('bg-transparent');
                        button.innerHTML = 'Follow';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>

<script>
    document.querySelector('#post-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from being submitted via HTTP POST

        // Get the form data using FormData
        const formData = new FormData(event.target);
        console.log(formData)
        // Send an AJAX request to the server
        fetch('{{ route('store.post') }}', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Assign the returned data to the post object
                const posts = data;
                const options = {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: 'numeric',
                minute: 'numeric'
                };
        let username = posts.user.name.replace(/\s+/g, '');
        let handle = `@${username}`;

        const date = new Date(posts.created_at);
        const formattedDate = date.toLocaleString('en-US', options);
                // Construct the HTML for the new post
                const postHtml = `
                <li class="post">
                 <article class="hover:bg-gray-800 transition duration-350 ease-in-out">
                     <div class="flex flex-shrink-0 p-4 pb-0">
                         <a href="#" class="flex-shrink-0 group block">
                             <div class="flex items-center">
                                 <div>
                                     <img class="inline-block h-10 w-10 rounded-full" src="https://pbs.twimg.com/profile_images/1121328878142853120/e-rpjoJi_bigger.png" alt="">
                                 </div>
                                 <div class="ml-3">
                                     <p class="text-base leading-6 font-medium text-white">
                                         ${posts.user.name}
                                         <span class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                            ${handle} - ${formattedDate}
                                         </span>
                                     </p>
                                 </div>
                                 </div>
                         </a>
                     </div>
                     <div class="pl-16">
                         <p class="text-base width-auto font-medium text-white flex-shrink">
                         ${posts.content}
                         </p>
                         <div class="flex items-center py-4">
                             <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                                 <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                     <g>
                                         <path d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path>
                                     </g>
                                 </svg>
                                 12.3 k
                             </div>
                             <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-green-400 transition duration-350 ease-in-out">
                                 <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                     <g>
                                         <path d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"></path>
                                     </g>
                                 </svg>
                                 14 k
                             </div>
                             <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-red-600 transition duration-350 ease-in-out">
                                 <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                     <g>
                                     <path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path>
                                     </g>
                                 </svg>
                                 14 k
                             </div>
                             <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                                 <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                     <g>
                                         <path d="M17.53 7.47l-5-5c-.293-.293-.768-.293-1.06 0l-5 5c-.294.293-.294.768 0 1.06s.767.294 1.06 0l3.72-3.72V15c0 .414.336.75.75.75s.75-.336.75-.75V4.81l3.72 3.72c.146.147.338.22.53.22s.384-.072.53-.22c.293-.293.293-.767 0-1.06z"></path>
                                         <path d="M19.708 21.944H4.292C3.028 21.944 2 20.916 2 19.652V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 .437.355.792.792.792h15.416c.437 0 .792-.355.792-.792V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 1.264-1.028 2.292-2.292 2.292z"></path>
                                     </g>
                                 </svg>
                             </div>
                         </div>
          
                     </div>
                     <hr class="border-gray-700">
                 </article>
                 </li>
                `;
                const post = document.querySelector('.posts');
                post.insertAdjacentHTML('afterbegin', postHtml);

            })
            .catch(error => console.error(error));
    });

    function fetchNewPosts() {
  fetch('/posts/latest')
    .then(response => response.json())
    .then(posts => {
      const newPosts = Array.isArray(posts.data) ? posts.data : Array.from(posts.data);
      const existingPosts = Array.from(document.querySelectorAll('#posts li'));
      const filteredPosts = newPosts.filter(post => !existingPosts.some(existingPost => existingPost.dataset.postId === post.id.toString()));
      const postsContainer = document.querySelector('#posts');
      filteredPosts.forEach(post => {
        const postElement = document.createElement('li');
        postElement.dataset.postId = post.id;

        // format the date string
        const options = {
          year: 'numeric',
          month: 'short',
          day: 'numeric',
          hour: 'numeric',
          minute: 'numeric'
        };
        const date = new Date(post.created_at);
        const formattedDate = date.toLocaleString('en-US', options);
        let username = post.user.name.replace(/\s+/g, '');
        let handle = `@${username}`;
        // use the formatted date string in the template
        postElement.innerHTML = `
          <article class="hover:bg-gray-800 transition duration-350 ease-in-out">
            <div class="flex flex-shrink-0 p-4 pb-0">
              <a href="#" class="flex-shrink-0 group block">
                <div class="flex items-center">
                  <div>
                    <img class="inline-block h-10 w-10 rounded-full" src="https://pbs.twimg.com/profile_images/1121328878142853120/e-rpjoJi_bigger.png" alt="">
                  </div>
                  <div class="ml-3">
                    <p class="text-base leading-6 capitalize font-medium text-white">
                      ${post.user.name}
                      <span class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                       ${handle} - ${formattedDate}
                      </span>
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <div class="pl-16">
              <p class="text-base width-auto font-medium text-white flex-shrink">
                ${post.content}
              </p>
              <div class="flex items-center py-4">
                <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                </div>
                <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                </div>
              </div>
            </div>
            <hr class="border-gray-700">
          </article>
        `;
        postsContainer.prepend(postElement);
      });
    });
}


fetchNewPosts();
setInterval(fetchNewPosts, 60000); 




// call fetchNewPosts every 5 seconds (adjust as needed)

</script>
