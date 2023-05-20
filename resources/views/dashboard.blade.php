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
                <form id="post-form" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-shrink-0 p-4 pb-0">
                        <a href="#" class="flex-shrink-0 group block">
                            <div class="flex items-center">
                                <div>
                                    <img class="inline-block h-10 w-10 rounded-full"
                                        src="{{ Auth::user()->profile_pic === 'default-profile.jpg' ? 'images/default-profile.jpg' : 'storage/' . Auth::user()->profile_pic }}"
                                        alt="">
                                </div>
                                <div class="ml-3">
                                    <p class="text-base leading-6 capitalize font-medium text-white">
                                        {{ Auth::user()->name }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="flex-1 px-2 pt-2 mt-2">
                        <textarea id="content" name="content"
                            class="bg-[#43627e] pr-24 pl-3 pt-3 text-white border-white border-1 font-medium text-lg w-full rounded"
                            rows="2" cols="50" placeholder="What's happening?"></textarea>
                    </div>
                    <div class="flex">
                        <div class="relative mt-2 ml-2">
                            <label for="image" class="flex items-center justify-center w-full h-full px-4 py-2 text-sm font-medium text-white transition duration-300 ease-in-out bg-blue-500 border border-transparent rounded-md shadow-sm cursor-pointer hover:bg-blue-600">
                              <span>Upload Image</span>
                              <input id="image" type="file" name="image" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            </label>
                          </div>
                          
                          <div class="mt-2 relative ml-3">
                            <label for="video" class="flex items-center justify-center w-full h-full px-4 py-2 text-sm font-medium text-white transition duration-300 ease-in-out bg-blue-500 border border-transparent rounded-md shadow-sm cursor-pointer hover:bg-blue-600">
                              <span>Upload Video</span>
                              <input id="video" type="file" name="video" accept="video/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            </label>
                          </div>
                    </div>
                    <div class="flex mb-5">
                        <div class="flex-1">   
                            <button type="submit"
                                class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-8 rounded-full mr-4 float-right">
                                Tweet
                            </button>
                        </div>
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
            <div id="load-more-container" class="text-center p-4"></div>


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
                                <svg class="m-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
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
    src="{{ $user->profile_pic === 'default-profile.jpg' ? 'images/default-profile.jpg' : 'storage/' . $user->profile_pic }}"
    alt="">

                                </div>
                                <div class="ml-3 mt-3">
                                    <p class="text-base leading-6 capitalize font-medium text-white">
                                        {{ $user->name }}
                                    </p>
                                    <p
                                        class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $user->email }}
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
                        <a href="{{route('more.followers')}}">
                        <h2 class="px-4 ml-2 w-48 font-bold text-blue-400">Show more</h2>
                        </a>
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

    followButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault(); 

            const userId = button.dataset.userId;
            const followUrl = `{{ route('follow', ':userId') }}`.replace(':userId', userId);
            const unfollowUrl = `{{ route('unfollow', ':userId') }}`.replace(':userId', userId);
            const isFollowing = button.classList.contains('bg-blue-500');

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
                    button.classList.toggle('bg-blue-500');
                    button.textContent = isFollowing ? 'Follow' : 'Following';
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });

    const unfollowButtons = document.querySelectorAll('.unfollow-button');

    unfollowButtons.forEach(button => {
        button.addEventListener('click', () => {
            const userId = button.dataset.userId;
            const unfollowUrl = `{{ route('unfollow', ':userId') }}`.replace(':userId', userId);

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
        event.preventDefault(); 

        const formData = new FormData(event.target);
        fetch('{{ route('store.post') }}', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const posts = data;
                const options = {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric'
                };

                const date = new Date(posts.created_at);
                const formattedDate = date.toLocaleString('en-US', options);
                const postHtml = `
                <li class="post">
                    <article class="hover:bg-gray-800 transition duration-350 ease-in-out">
            <div class="flex flex-shrink-0 p-4 pb-0">
              <a href="#" class="flex-shrink-0 group block">
                <div class="flex items-center">
                  <div>
                    <img class="inline-block h-10 w-10 rounded-full" src="${posts.user.profile_pic === 'default-profile.jpg' ? 'images/default-profile.jpg' : 'storage/'+posts.user.profile_pic}" alt="">
                  </div>
                  <div class="ml-3">
                    <p class="text-base leading-6 font-medium text-white">
                      ${posts.user.name}
                      <span class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                       ${posts.user.email} - ${formattedDate}
                      </span>
                    </p>
                  </div>
                </div>
              </a>
              <button id="dropdownMenuIconButton${posts.id}" data-dropdown-toggle="dropdownDots${posts.id}" class="inline-flex items-center ml-[120px] max-h-[40px] p-2 text-sm font-medium text-center text-gray-900 bg-gray-400 rounded-lg hover:bg-gray-600 focus:ring-4 focus:outline-none dark:text-gray-800 focus:ring-gray-50" type="button" onclick="toggleDropdown('dropdownDots${posts.id}')">
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
  </button>
  <div id="dropdownDots${posts.id}" class="z-50 hidden bg-gray-400 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
      <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton${posts.id}">
        <li>
          <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bookmark</a>
        </li>
      </ul>
  </div>
            </div>
            <div class="pl-16">
              <p class="text-base width-auto font-medium text-white flex-shrink">
                ${posts.content}
              </p>
              <div class="flex px-5">
                <div class="mr-3">
                    ${posts.image ? `<img src="storage/${posts.image}" width="300" height="200" alt="Post Image">` : ''}
                </div>
                <div class="">
                ${posts.video ? `<video src="storage/${posts.video}" width="300" height="200" controls></video>` : ''}
                </div>
                </div>
              <div class="flex items-center py-4">
                <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                </div>
                <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                </div>
              </div>
              <div class="flex items-center py-4">
                <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                <button class="like-button ${posts.liked===true ? 'liked' : ''}" data-post-id="${posts.id}" data-csrf-token="{{ csrf_token() }}">
                    <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    <span class="like-count">${posts.likes_count}</span>

                </button>
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

    function toggleDropdown(dropdownId) {
    var dropdown = document.getElementById(dropdownId);
    dropdown.classList.toggle('hidden');
  }
    let currentPage = 1;
    var lastPage;
    function fetchNewPosts(page) {
        fetch(`/posts/latest?page=${page}`)
            .then(response => response.json())
            .then(posts => {
                lastPage = posts.last_page;
                const newPosts = Array.isArray(posts.data) ? posts.data : Array.from(posts.data);
                const existingPosts = Array.from(document.querySelectorAll('#posts li'));
                const filteredPosts = newPosts.filter(post => !existingPosts.some(existingPost => existingPost
                    .dataset.postId === post.id.toString()));
                const postsContainer = document.querySelector('#posts');
                filteredPosts.forEach(post => {
                    const postElement = document.createElement('li');
                    postElement.dataset.postId = post.id;

                    const options = {
                        year: 'numeric',
                        month: 'short',
                        day: 'numeric',
                        hour: 'numeric',
                        minute: 'numeric'
                    };
                    const date = new Date(post.created_at);
                    const formattedDate = date.toLocaleString('en-US', options);
                    postElement.innerHTML = `
          <article class="hover:bg-gray-800 transition duration-350 ease-in-out">
            <div class="flex flex-shrink-0 p-4 pb-0 absolute">
              <a href="#" class="flex-shrink-0 group block">
                <div class="flex items-center">
                  <div>
                    <img class="inline-block h-10 w-10 rounded-full" src="${post.user.profile_pic === 'default-profile.jpg' ? 'images/default-profile.jpg' : 'storage/'+post.user.profile_pic}" alt="">
                  </div>
                  <div class="ml-3">
                    <p class="text-base leading-6 font-medium text-white">
                      ${post.user.name}
                      <span class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                       ${post.user.email} - ${formattedDate}
                      </span>
                    </p>
                  </div>
                </div>    
              </a>
            <button id="dropdownMenuIconButton${post.id}" data-dropdown-toggle="dropdownDots${post.id}" class="inline-flex items-center ml-[120px] max-h-[40px] p-2 text-sm font-medium text-center text-gray-900 bg-gray-400 rounded-lg hover:bg-gray-600 focus:ring-4 focus:outline-none dark:text-gray-800 focus:ring-gray-50" type="button" onclick="toggleDropdown('dropdownDots${post.id}')">
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
            </button>
            <div id="dropdownDots${post.id}" class="z-50 hidden bg-gray-400 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton${post.id}">
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="${post.bookmarks.some(bookmark => bookmark.post_id === post.id) ? `removeBookmark(${post.id})` : `bookmarkPost(${post.id})`}">
  ${post.bookmarks.some(bookmark => bookmark.post_id === post.id) ? 'Remove Bookmark' : 'Bookmark'}
</a>

                </li>
                </ul>
            </div>
            </div>
            <div>
              <div class="flex px-5">
                <div class="mr-3 mt-[100px]">
                    ${post.image ? `<img src="storage/${post.image}" width="300" height="200" alt="Post Image">` : ''}
                </div>
                <div class="mt-[100px]">
                ${post.video ? `<video src="storage/${post.video}" width="300" height="200" controls></video>` : ''}
                </div>
                </div>
                <p class="pl-[70px] mt-5 pb-5 text-base width-auto font-medium text-white flex-shrink">
                ${post.content}
              </p>
              <div class="flex items-center py-4">
                <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                </div>
                <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                </div>
              </div>
              <div class="flex items-center py-4 pl-[70px]">
                <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                <button class="like-button ${post.liked===true ? 'liked' : ''}" data-post-id="${post.id}" data-csrf-token="{{ csrf_token() }}">
                    <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    <span class="like-count">${post.likes_count}</span>

                </button>
            </div>
          </div>
            </div>
            <hr class="border-gray-700">
          </article>
        `;
            postsContainer.prepend(postElement);
        });
        if(currentPage < lastPage){
    const loadMoreButton = document.createElement('button');
    loadMoreButton.textContent = 'Load more';
    loadMoreButton.classList.add('bg-blue-500', 'hover:bg-blue-700', 'text-white', 'py-2', 'px-4', 'rounded-full');
    loadMoreButton.addEventListener('click', () => {
      fetchNewPosts(++currentPage);
    });
    document.querySelector('#load-more-container').appendChild(loadMoreButton);
}else{
    document.querySelector('#load-more-container').remove();
}
    });
    }
    fetchNewPosts(currentPage);

    $(document).on('click', '.like-button', function(event) {
    const postId = $(this).data('post-id');
    const likeCountElement = $(this).find('.like-count');
    const csrfToken = $(this).data('csrf-token');
    const isLiked = $(this).hasClass('liked');

    if (isLiked) {
        $.ajax({
            url: `/posts/${postId}/dislike`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            },
            data: JSON.stringify({
                post_id: postId
            })
        })
        .done(function(data) {
            likeCountElement.text(data.like_count);
            $(this).removeClass('liked');
        }.bind(this))
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.error(errorThrown);
        });
    } else {
        $.ajax({
            url: `/posts/${postId}/like`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            },
            data: JSON.stringify({
                post_id: postId
            })
        })
        .done(function(data) {
            $(this).addClass('liked');
            likeCountElement.text(data.likeCount);
        }.bind(this))
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.error(errorThrown);
        });
    }

    event.preventDefault();
});

function bookmarkPost(postId) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('post_id', postId);

    $.ajax({
        url: '/bookmarks',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            alert(response.message);
            
            // Change the text of the bookmark
            var bookmarkElement = $(`a[onclick="bookmarkPost(${postId})"]`);
            bookmarkElement.text('Remove Bookmark');
            bookmarkElement.attr('onclick', `removeBookmark(${postId})`);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}

function removeBookmark(postId) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('_method', 'DELETE'); // Add the _method field with the value "DELETE"
    formData.append('post_id', postId);

    $.ajax({
        url: '/bookmarks/' + postId,
        type: 'POST', // Use POST method to send the DELETE request
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            alert(response.message);

            // Change the text of the bookmark back to "Bookmark"
            var bookmarkElement = $(`a[onclick="removeBookmark(${postId})"]`);
            bookmarkElement.text('Bookmark');
            bookmarkElement.attr('onclick', `bookmarkPost(${postId})`);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}


</script>
