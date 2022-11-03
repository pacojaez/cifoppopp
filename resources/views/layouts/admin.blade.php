<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="./assets/img/apple-icon.png"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css"
    />
    <title>Dashboard | Tailwind Starter Kit by Creative Tim</title>
  </head>
  <body class="antialiased text-blueGray-700">
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
      <nav
        class="relative z-10 flex flex-wrap items-center justify-between px-6 py-4 bg-white shadow-xl md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden md:w-64"
      >
        <div
          class="flex flex-wrap items-center justify-between w-full px-0 mx-auto md:flex-col md:items-stretch md:min-h-full md:flex-nowrap"
        >
          <button
            class="px-3 py-1 text-xl leading-none text-black bg-transparent border border-transparent border-solid rounded opacity-50 cursor-pointer md:hidden"
            type="button"
            onclick="toggleNavbar('example-collapse-sidebar')"
          >
            <i class="fas fa-bars"></i></button
          >
          <a
            class="inline-block p-4 px-0 mr-0 text-sm font-bold text-left uppercase md:block md:pb-2 text-blueGray-600 whitespace-nowrap"
            href="javascript:void(0)"
          >
            Tailwind Starter Kit
          </a>
          <ul class="flex flex-wrap items-center list-none md:hidden">
            <li class="relative inline-block">
              <a
                class="block px-3 py-1 text-blueGray-500"
                href="#pablo"
                onclick="openDropdown(event,'notification-dropdown')"
                ><i class="fas fa-bell"></i
              ></a>
              <div
                class="z-50 hidden float-left py-2 mt-1 text-base text-left list-none bg-white rounded shadow-lg"
                style="min-width: 12rem;"
                id="notification-dropdown"
              >
                <a
                  href="#pablo"
                  class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700"
                  >Action</a
                ><a
                  href="#pablo"
                  class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700"
                  >Another action</a
                ><a
                  href="#pablo"
                  class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700"
                  >Something else here</a
                >
                <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                <a
                  href="#pablo"
                  class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700"
                  >Seprated link</a
                >
              </div>
            </li>
            <li class="relative inline-block">
              <a
                class="block text-blueGray-500"
                href="#pablo"
                onclick="openDropdown(event,'user-responsive-dropdown')"
                ><div class="flex items-center">
                  <span
                    class="inline-flex items-center justify-center w-12 h-12 text-sm text-white rounded-full bg-blueGray-200"
                    ><img
                      alt="..."
                      class="w-full align-middle border-none rounded-full shadow-lg"
                      src="./assets/img/team-1-800x800.jpg"
                  /></span></div
              ></a>
              <div
                class="z-50 hidden float-left py-2 mt-1 text-base text-left list-none bg-white rounded shadow-lg"
                style="min-width: 12rem;"
                id="user-responsive-dropdown"
              >
                <a
                  href="#pablo"
                  class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700"
                  >Action</a
                ><a
                  href="#pablo"
                  class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700"
                  >Another action</a
                ><a
                  href="#pablo"
                  class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700"
                  >Something else here</a
                >
                <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                <a
                  href="#pablo"
                  class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700"
                  >Seprated link</a
                >
              </div>
            </li>
          </ul>
          <div
            class="absolute top-0 left-0 right-0 z-40 items-center flex-1 hidden h-auto overflow-x-hidden overflow-y-auto rounded shadow md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none"
            id="example-collapse-sidebar"
          >
            <div
              class="block pb-4 mb-4 border-b border-solid md:min-w-full md:hidden border-blueGray-200"
            >
              <div class="flex flex-wrap">
                <div class="w-6/12">
                  <a
                    class="inline-block p-4 px-0 mr-0 text-sm font-bold text-left uppercase md:block md:pb-2 text-blueGray-600 whitespace-nowrap"
                    href="javascript:void(0)"
                  >
                    Tailwind Starter Kit
                  </a>
                </div>
                <div class="flex justify-end w-6/12">
                  <button
                    type="button"
                    class="px-3 py-1 text-xl leading-none text-black bg-transparent border border-transparent border-solid rounded opacity-50 cursor-pointer md:hidden"
                    onclick="toggleNavbar('example-collapse-sidebar')"
                  >
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </div>
            <form class="mt-6 mb-4 md:hidden">
              <div class="pt-0 mb-3">
                <input
                  type="text"
                  placeholder="Search"
                  class="w-full h-12 px-3 py-2 text-base font-normal leading-snug bg-white border border-0 border-solid rounded shadow-none outline-none border-blueGray-500 placeholder-blueGray-300 text-blueGray-600 focus:outline-none"
                />
              </div>
            </form>
            <ul class="flex flex-col list-none md:flex-col md:min-w-full">
              <li class="items-center">
                <a
                  class="block py-3 text-xs font-bold text-pink-500 uppercase hover:text-pink-600"
                  href="#/dashboard"
                  ><i class="mr-2 text-sm opacity-75 fas fa-tv"></i>
                  Dashboard</a
                >
              </li>
              <li class="items-center">
                <a
                  class="block py-3 text-xs font-bold uppercase text-blueGray-700 hover:text-blueGray-500"
                  href="#/landing"
                  ><i class="mr-2 text-sm fas fa-newspaper text-blueGray-400"></i>
                  Landing Page</a
                >
              </li>
              <li class="items-center">
                <a
                  class="block py-3 text-xs font-bold uppercase text-blueGray-700 hover:text-blueGray-500"
                  href="#/profile"
                  ><i class="mr-2 text-sm fas fa-user-circle text-blueGray-400"></i>
                  Profile Page</a
                >
              </li>
              <li class="items-center">
                <a
                  class="block py-3 text-xs font-bold uppercase text-blueGray-700 hover:text-blueGray-500"
                  href="#/login"
                  ><i class="mr-2 text-sm fas fa-fingerprint text-blueGray-400"></i>
                  Login</a
                >
              </li>
              <li class="items-center">
                <a
                  class="block py-3 text-xs font-bold uppercase text-blueGray-300"
                  href="#pablo"
                  ><i
                    class="mr-2 text-sm fas fa-clipboard-list text-blueGray-300"
                  ></i>
                  Register (soon)</a
                >
              </li>
              <li class="items-center">
                <a
                  class="block py-3 text-xs font-bold uppercase text-blueGray-300"
                  href="#pablo"
                  ><i class="mr-2 text-sm fas fa-tools text-blueGray-300"></i>
                  Settings (soon)</a
                >
              </li>
            </ul>
            <hr class="my-4 md:min-w-full" />
            <h6
              class="block pt-1 pb-4 text-xs font-bold no-underline uppercase md:min-w-full text-blueGray-500"
            >
              Documentation
            </h6>
            <ul
              class="flex flex-col list-none md:flex-col md:min-w-full md:mb-4"
            >
              <li class="inline-flex">
                <a
                  class="block mb-4 text-sm font-semibold no-underline text-blueGray-700 hover:text-blueGray-500"
                  href="#/documentation/styles"
                  ><i
                    class="mr-2 text-base fas fa-paint-brush text-blueGray-400"
                  ></i>
                  Styles</a
                >
              </li>
              <li class="inline-flex">
                <a
                  class="block mb-4 text-sm font-semibold no-underline text-blueGray-700 hover:text-blueGray-500"
                  href="#/documentation/alerts"
                  ><i class="mr-2 text-base fab fa-css3-alt text-blueGray-400"></i>
                  CSS Components</a
                >
              </li>
              <li class="inline-flex">
                <a
                  class="block mb-4 text-sm font-semibold no-underline text-blueGray-700 hover:text-blueGray-500"
                  href="#/documentation/vue/alerts"
                  ><i class="mr-2 text-base fab fa-vuejs text-blueGray-400"></i>
                  VueJS</a
                >
              </li>
              <li class="inline-flex">
                <a
                  class="block mb-4 text-sm font-semibold no-underline text-blueGray-700 hover:text-blueGray-500"
                  href="#/documentation/react/alerts"
                  ><i class="mr-2 text-base fab fa-react text-blueGray-400"></i>
                  React</a
                >
              </li>
              <li class="inline-flex">
                <a
                  class="block mb-4 text-sm font-semibold no-underline text-blueGray-700 hover:text-blueGray-500"
                  href="#/documentation/angular/alerts"
                  ><i class="mr-2 text-base fab fa-angular text-blueGray-400"></i>
                  Angular</a
                >
              </li>
              <li class="inline-flex">
                <a
                  class="block mb-4 text-sm font-semibold no-underline text-blueGray-700 hover:text-blueGray-500"
                  href="#/documentation/javascript/alerts"
                  ><i class="mr-2 text-base fab fa-js-square text-blueGray-400"></i>
                  Javascript</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="relative md:ml-64 bg-blueGray-50">
        <nav
          class="absolute top-0 left-0 z-10 flex items-center w-full p-4 bg-transparent md:flex-row md:flex-nowrap md:justify-start"
        >
          <div
            class="flex flex-wrap items-center justify-between w-full px-4 mx-autp md:flex-nowrap md:px-10"
          >
            <a
              class="hidden text-sm font-semibold text-white uppercase lg:inline-block"
              href="./index.html"
              >Dashboard</a
            >
            <form
              class="flex-row flex-wrap items-center hidden mr-3 md:flex lg:ml-auto"
            >
              <div class="relative flex flex-wrap items-stretch w-full">
                <span
                  class="absolute z-10 items-center justify-center w-8 h-full py-3 pl-3 text-base font-normal leading-snug text-center bg-transparent rounded text-blueGray-300"
                  ><i class="fas fa-search"></i
                ></span>
                <input
                  type="text"
                  placeholder="Search here..."
                  class="relative w-full px-3 py-3 pl-10 text-sm bg-white border-0 rounded shadow outline-none placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring"
                />
              </div>
            </form>
            <ul
              class="flex-col items-center hidden list-none md:flex-row md:flex"
            >
              <a class="block text-blueGray-500" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
                <div class="flex items-center">
                  <span
                    class="inline-flex items-center justify-center w-12 h-12 text-sm text-white rounded-full bg-blueGray-200"
                    ><img
                      alt="..."
                      class="w-full align-middle border-none rounded-full shadow-lg"
                      src="./assets/img/team-1-800x800.jpg"
                  /></span>
                </div>
              </a>
              <div
                class="z-50 hidden float-left py-2 mt-1 text-base text-left list-none bg-white rounded shadow-lg"
                style="min-width: 12rem;"
                id="user-dropdown"
              >
                <a
                  href="#pablo"
                  class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700"
                  >Action</a
                ><a
                  href="#pablo"
                  class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700"
                  >Another action</a
                ><a
                  href="#pablo"
                  class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700"
                  >Something else here</a
                >
                <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                <a
                  href="#pablo"
                  class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700"
                  >Seprated link</a
                >
              </div>
            </ul>
          </div>
        </nav>
        <!-- Header -->
        <div class="relative pt-12 pb-32 bg-pink-600 md:pt-32">
          <div class="w-full px-4 mx-auto md:px-10">
            <div>
              <!-- Card stats -->
              <div class="flex flex-wrap">
                <div class="w-full px-4 lg:w-6/12 xl:w-3/12">
                  <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white rounded shadow-lg xl:mb-0">
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
                          <h5 class="text-xs font-bold uppercase text-blueGray-400">
                            Traffic
                          </h5>
                          <span class="text-xl font-semibold text-blueGray-700">
                            350,897
                          </span>
                        </div>
                        <div class="relative flex-initial w-auto pl-4">
                          <div class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white bg-red-500 rounded-full shadow-lg">
                            <i class="far fa-chart-bar"></i>
                          </div>
                        </div>
                      </div>
                        <p class="mt-4 text-sm text-blueGray-400">
                        <span class="mr-2 text-emerald-500">
                          <i class="fas fa-arrow-up"></i> 3.48%
                        </span>
                        <span class="whitespace-nowrap">
                          Since last month
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="w-full px-4 lg:w-6/12 xl:w-3/12">
                  <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white rounded shadow-lg xl:mb-0">
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
                          <h5 class="text-xs font-bold uppercase text-blueGray-400">
                            New users
                          </h5>
                          <span class="text-xl font-semibold text-blueGray-700">
                            2,356
                          </span>
                        </div>
                        <div class="relative flex-initial w-auto pl-4">
                          <div class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white bg-orange-500 rounded-full shadow-lg">
                            <i class="fas fa-chart-pie"></i>
                          </div>
                        </div>
                      </div>
                      <p class="mt-4 text-sm text-blueGray-400">
                        <span class="mr-2 text-red-500">
                          <i class="fas fa-arrow-down"></i> 3.48%
                        </span>
                        <span class="whitespace-nowrap">
                          Since last week
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="w-full px-4 lg:w-6/12 xl:w-3/12">
                  <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white rounded shadow-lg xl:mb-0">
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
                          <h5 class="text-xs font-bold uppercase text-blueGray-400">
                            Sales
                          </h5>
                          <span class="text-xl font-semibold text-blueGray-700">
                            924
                          </span>
                        </div>
                        <div class="relative flex-initial w-auto pl-4">
                          <div class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white bg-pink-500 rounded-full shadow-lg">
                            <i class="fas fa-users"></i>
                          </div>
                        </div>
                      </div>
                      <p class="mt-4 text-sm text-blueGray-400">
                        <span class="mr-2 text-orange-500">
                          <i class="fas fa-arrow-down"></i> 1.10%
                        </span>
                        <span class="whitespace-nowrap">
                          Since yesterday
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="w-full px-4 lg:w-6/12 xl:w-3/12">
                  <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white rounded shadow-lg xl:mb-0">
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
                          <h5 class="text-xs font-bold uppercase text-blueGray-400">
                            Performance
                          </h5>
                          <span class="text-xl font-semibold text-blueGray-700">
                            49,65%
                          </span>
                        </div>
                        <div class="relative flex-initial w-auto pl-4">
                          <div class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white rounded-full shadow-lg bg-lightBlue-500">
                            <i class="fas fa-percent"></i>
                          </div>
                        </div>
                      </div>
                      <p class="mt-4 text-sm text-blueGray-400">
                        <span class="mr-2 text-emerald-500">
                          <i class="fas fa-arrow-up"></i> 12%
                        </span>
                        <span class="whitespace-nowrap">
                          Since last month
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="w-full px-4 mx-auto -m-24 md:px-10">
          <div class="flex flex-wrap">
            <div class="w-full px-4 mb-12 xl:w-8/12 xl:mb-0">
              <div
                class="relative flex flex-col w-full min-w-0 mb-6 break-words rounded shadow-lg bg-blueGray-800"
              >
                <div class="px-4 py-3 mb-0 bg-transparent rounded-t">
                  <div class="flex flex-wrap items-center">
                    <div class="relative flex-1 flex-grow w-full max-w-full">
                      <h6
                        class="mb-1 text-xs font-semibold uppercase text-blueGray-100"
                      >
                        Overview
                      </h6>
                      <h2 class="text-xl font-semibold text-white">
                        Sales value
                      </h2>
                    </div>
                  </div>
                </div>
                <div class="flex-auto p-4">
                  <!-- Chart -->
                  <div class="relative" style="height:350px">
                    <canvas id="line-chart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full px-4 xl:w-4/12">
              <div
                class="relative flex flex-col w-full min-w-0 mb-6 break-words bg-white rounded shadow-lg"
              >
                <div class="px-4 py-3 mb-0 bg-transparent rounded-t">
                  <div class="flex flex-wrap items-center">
                    <div class="relative flex-1 flex-grow w-full max-w-full">
                      <h6
                        class="mb-1 text-xs font-semibold uppercase text-blueGray-400"
                      >
                        Performance
                      </h6>
                      <h2 class="text-xl font-semibold text-blueGray-700">
                        Total orders
                      </h2>
                    </div>
                  </div>
                </div>
                <div class="flex-auto p-4">
                  <!-- Chart -->
                  <div class="relative" style="height:350px">
                    <canvas id="bar-chart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex flex-wrap mt-4">
            <div class="w-full px-4 mb-12 xl:w-8/12 xl:mb-0">
              <div class="relative flex flex-col w-full min-w-0 mb-6 break-words bg-white rounded shadow-lg">
                <div class="px-4 py-3 mb-0 border-0 rounded-t">
                  <div class="flex flex-wrap items-center">
                    <div class="relative flex-1 flex-grow w-full max-w-full px-4">
                      <h3 class="text-base font-semibold text-blueGray-700">
                        Page visits
                      </h3>
                    </div>
                    <div class="relative flex-1 flex-grow w-full max-w-full px-4 text-right">
                      <button
                        class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase bg-indigo-500 rounded outline-none active:bg-indigo-600 focus:outline-none"
                        type="button"
                        style="transition:all .15s ease"
                      >
                        See all
                      </button>
                    </div>
                  </div>
                </div>
                <div class="block w-full overflow-x-auto">
                  <!-- Projects table -->
                  <table class="items-center w-full bg-transparent border-collapse">
                    <thead>
                      <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid bg-blueGray-50 text-blueGray-500 border-blueGray-100 whitespace-nowrap">
                          Page name
                        </th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid bg-blueGray-50 text-blueGray-500 border-blueGray-100 whitespace-nowrap">
                          Visitors
                        </th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid bg-blueGray-50 text-blueGray-500 border-blueGray-100 whitespace-nowrap">
                          Unique users
                        </th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid bg-blueGray-50 text-blueGray-500 border-blueGray-100 whitespace-nowrap">
                          Bounce rate
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th class="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          /argon/
                        </th>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          4,569
                        </td>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          340
                        </td>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          <i class="mr-4 fas fa-arrow-up text-emerald-500"></i>
                          46,53%
                        </td>
                      </tr>
                      <tr>
                        <th class="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          /argon/index.html
                        </th>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          3,985
                        </td>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          319
                        </td>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          <i class="mr-4 text-orange-500 fas fa-arrow-down"></i>
                          46,53%
                        </td>
                      </tr>
                      <tr>
                        <th class="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          /argon/charts.html
                        </th>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          3,513
                        </td>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          294
                        </td>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          <i class="mr-4 text-orange-500 fas fa-arrow-down"></i>
                          36,49%
                        </td>
                      </tr>
                      <tr>
                        <th class="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          /argon/tables.html
                        </th>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          2,050
                        </td>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          147
                        </td>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          <i class="mr-4 fas fa-arrow-up text-emerald-500"></i>
                          50,87%
                        </td>
                      </tr>
                      <tr>
                        <th class="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          /argon/profile.html
                        </th>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          1,795
                        </td>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          190
                        </td>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          <i class="mr-4 text-red-500 fas fa-arrow-down"></i>
                          46,53%
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="w-full px-4 xl:w-4/12">
              <div class="relative flex flex-col w-full min-w-0 mb-6 break-words bg-white rounded shadow-lg">
                <div class="px-4 py-3 mb-0 border-0 rounded-t">
                  <div class="flex flex-wrap items-center">
                    <div class="relative flex-1 flex-grow w-full max-w-full px-4">
                      <h3 class="text-base font-semibold text-blueGray-700">
                        Social traffic
                      </h3>
                    </div>
                    <div class="relative flex-1 flex-grow w-full max-w-full px-4 text-right">
                      <button
                        class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase bg-indigo-500 rounded outline-none active:bg-indigo-600 focus:outline-none"
                        type="button"
                        style="transition:all .15s ease"
                      >
                        See all
                      </button>
                    </div>
                  </div>
                </div>
                <div class="block w-full overflow-x-auto">
                  <!-- Projects table -->
                  <table class="items-center w-full bg-transparent border-collapse">
                    <thead class="thead-light">
                      <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid bg-blueGray-50 text-blueGray-500 border-blueGray-100 whitespace-nowrap">
                          Referral
                        </th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid bg-blueGray-50 text-blueGray-500 border-blueGray-100 whitespace-nowrap">
                          Visitors
                        </th>
                        <th
                          class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid bg-blueGray-50 text-blueGray-500 border-blueGray-100 whitespace-nowrap"
                          style="min-width:140px"
                        ></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th class="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          Facebook
                        </th>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          1,480
                        </td>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          <div class="flex items-center">
                            <span class="mr-2">60%</span>
                            <div class="relative w-full">
                              <div class="flex h-2 overflow-hidden text-xs bg-red-200 rounded">
                                <div
                                  style="width:60%"
                                  class="flex flex-col justify-center text-center text-white bg-red-500 shadow-none whitespace-nowrap"
                                ></div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th class="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          Facebook
                        </th>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          5,480
                        </td>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          <div class="flex items-center">
                            <span class="mr-2">70%</span>
                            <div class="relative w-full">
                              <div class="flex h-2 overflow-hidden text-xs rounded bg-emerald-200">
                                <div
                                  style="width:70%"
                                  class="flex flex-col justify-center text-center text-white shadow-none whitespace-nowrap bg-emerald-500"
                                ></div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th class="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          Google
                        </th>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          4,807
                        </td>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          <div class="flex items-center">
                            <span class="mr-2">80%</span>
                            <div class="relative w-full">
                              <div class="flex h-2 overflow-hidden text-xs bg-purple-200 rounded">
                                <div
                                  style="width:80%"
                                  class="flex flex-col justify-center text-center text-white bg-purple-500 shadow-none whitespace-nowrap"
                                ></div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th class="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          Instagram
                        </th>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          3,678
                        </td>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          <div class="flex items-center">
                            <span class="mr-2">75%</span>
                            <div class="relative w-full">
                              <div class="flex h-2 overflow-hidden text-xs rounded bg-lightBlue-200">
                                <div
                                  style="width:75%"
                                  class="flex flex-col justify-center text-center text-white shadow-none whitespace-nowrap bg-lightBlue-500"
                                ></div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th class="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          twitter
                        </th>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          2,645
                        </td>
                        <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                          <div class="flex items-center">
                            <span class="mr-2">30%</span>
                            <div class="relative w-full">
                              <div class="flex h-2 overflow-hidden text-xs bg-orange-200 rounded">
                                <div
                                  style="width:30%"
                                  class="flex flex-col justify-center text-center text-white shadow-none whitespace-nowrap bg-emerald-500"
                                ></div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <footer class="block py-4">
            <div class="container px-4 mx-auto">
              <hr class="mb-4 border-b-1 border-blueGray-200" />
              <div class="flex flex-wrap items-center justify-center md:justify-between">
                <div class="w-full px-4 md:w-4/12">
                  <div class="py-1 text-sm font-semibold text-blueGray-500">
                    Copyright © <span id="javascript-date"></span>
                    <a
                      href="https://www.creative-tim.com"
                      class="py-1 text-sm font-semibold text-blueGray-500 hover:text-blueGray-700"
                    >
                      Creative Tim
                    </a>
                  </div>
                </div>
                <div class="w-full px-4 md:w-8/12">
                  <ul class="flex flex-wrap justify-center list-none md:justify-end">
                    <li>
                      <a
                        href="https://www.creative-tim.com"
                        class="block px-3 py-1 text-sm font-semibold text-blueGray-600 hover:text-blueGray-800"
                      >
                        Creative Tim
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://www.creative-tim.com/presentation"
                        class="block px-3 py-1 text-sm font-semibold text-blueGray-600 hover:text-blueGray-800"
                      >
                        About Us
                      </a>
                    </li>
                    <li>
                      <a
                        href="http://blog.creative-tim.com"
                        class="block px-3 py-1 text-sm font-semibold text-blueGray-600 hover:text-blueGray-800"
                      >
                        Blog
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://github.com/creativetimofficial/tailwind-starter-kit/blob/main/LICENSE.md"
                        class="block px-3 py-1 text-sm font-semibold text-blueGray-600 hover:text-blueGray-800"
                      >
                        MIT License
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
      charset="utf-8"
    ></script>
    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
    <script type="text/javascript">
      /* Sidebar - Side navigation menu on mobile/responsive mode */
      function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("bg-white");
        document.getElementById(collapseID).classList.toggle("m-2");
        document.getElementById(collapseID).classList.toggle("py-3");
        document.getElementById(collapseID).classList.toggle("px-6");
      }
      /* Function for dropdowns */
      function openDropdown(event, dropdownID) {
        let element = event.target;
        while (element.nodeName !== "A") {
          element = element.parentNode;
        }
        var popper = Popper.createPopper(element, document.getElementById(dropdownID), {
          placement: "bottom-end"
        });
        document.getElementById(dropdownID).classList.toggle("hidden");
        document.getElementById(dropdownID).classList.toggle("block");
      }


      (function() {
        /* Add current date to the footer */
        document.getElementById("javascript-date").innerHTML = new Date().getFullYear();
        /* Chart initialisations */
        /* Line Chart */
        var config = {
          type: "line",
          data: {
            labels: [
              "January",
              "February",
              "March",
              "April",
              "May",
              "June",
              "July"
            ],
            datasets: [
              {
                label: new Date().getFullYear(),
                backgroundColor: "#4c51bf",
                borderColor: "#4c51bf",
                data: [65, 78, 66, 44, 56, 67, 75],
                fill: false
              },
              {
                label: new Date().getFullYear() - 1,
                fill: false,
                backgroundColor: "#ed64a6",
                borderColor: "#ed64a6",
                data: [40, 68, 86, 74, 56, 60, 87]
              }
            ]
          },
          options: {
            maintainAspectRatio: false,
            responsive: true,
            title: {
              display: false,
              text: "Sales Charts",
              fontColor: "white"
            },
            legend: {
              labels: {
                fontColor: "white"
              },
              align: "end",
              position: "bottom"
            },
            tooltips: {
              mode: "index",
              intersect: false
            },
            hover: {
              mode: "nearest",
              intersect: true
            },
            scales: {
              xAxes: [
                {
                  ticks: {
                    fontColor: "rgba(255,255,255,.7)"
                  },
                  display: true,
                  scaleLabel: {
                    display: false,
                    labelString: "Month",
                    fontColor: "white"
                  },
                  gridLines: {
                    display: false,
                    borderDash: [2],
                    borderDashOffset: [2],
                    color: "rgba(33, 37, 41, 0.3)",
                    zeroLineColor: "rgba(0, 0, 0, 0)",
                    zeroLineBorderDash: [2],
                    zeroLineBorderDashOffset: [2]
                  }
                }
              ],
              yAxes: [
                {
                  ticks: {
                    fontColor: "rgba(255,255,255,.7)"
                  },
                  display: true,
                  scaleLabel: {
                    display: false,
                    labelString: "Value",
                    fontColor: "white"
                  },
                  gridLines: {
                    borderDash: [3],
                    borderDashOffset: [3],
                    drawBorder: false,
                    color: "rgba(255, 255, 255, 0.15)",
                    zeroLineColor: "rgba(33, 37, 41, 0)",
                    zeroLineBorderDash: [2],
                    zeroLineBorderDashOffset: [2]
                  }
                }
              ]
            }
          }
        };
        var ctx = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(ctx, config);

        /* Bar Chart */
        config = {
          type: "bar",
          data: {
            labels: [
              "January",
              "February",
              "March",
              "April",
              "May",
              "June",
              "July"
            ],
            datasets: [
              {
                label: new Date().getFullYear(),
                backgroundColor: "#ed64a6",
                borderColor: "#ed64a6",
                data: [30, 78, 56, 34, 100, 45, 13],
                fill: false,
                barThickness: 8
              },
              {
                label: new Date().getFullYear() - 1,
                fill: false,
                backgroundColor: "#4c51bf",
                borderColor: "#4c51bf",
                data: [27, 68, 86, 74, 10, 4, 87],
                barThickness: 8
              }
            ]
          },
          options: {
            maintainAspectRatio: false,
            responsive: true,
            title: {
              display: false,
              text: "Orders Chart"
            },
            tooltips: {
              mode: "index",
              intersect: false
            },
            hover: {
              mode: "nearest",
              intersect: true
            },
            legend: {
              labels: {
                fontColor: "rgba(0,0,0,.4)"
              },
              align: "end",
              position: "bottom"
            },
            scales: {
              xAxes: [
                {
                  display: false,
                  scaleLabel: {
                    display: true,
                    labelString: "Month"
                  },
                  gridLines: {
                    borderDash: [2],
                    borderDashOffset: [2],
                    color: "rgba(33, 37, 41, 0.3)",
                    zeroLineColor: "rgba(33, 37, 41, 0.3)",
                    zeroLineBorderDash: [2],
                    zeroLineBorderDashOffset: [2]
                  }
                }
              ],
              yAxes: [
                {
                  display: true,
                  scaleLabel: {
                    display: false,
                    labelString: "Value"
                  },
                  gridLines: {
                    borderDash: [2],
                    drawBorder: false,
                    borderDashOffset: [2],
                    color: "rgba(33, 37, 41, 0.2)",
                    zeroLineColor: "rgba(33, 37, 41, 0.15)",
                    zeroLineBorderDash: [2],
                    zeroLineBorderDashOffset: [2]
                  }
                }
              ]
            }
          }
        };
        ctx = document.getElementById("bar-chart").getContext("2d");
        window.myBar = new Chart(ctx, config);
      })();
    </script>
  </body>
</html>
Footer
© 2022 GitHub, I
