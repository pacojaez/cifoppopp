

@extends('layouts.master')

@section('titulo', 'Welcome to Cifoppopp')

@section('contenido')
        {{-- <div class="relative flex justify-center min-h-screen py-4 bg-gray-100 items-top dark:bg-gray-900 sm:items-center sm:pt-0"> --}}
            <main>
                <div
                  class="relative flex items-center content-center justify-center pt-16 pb-32"
                  style="min-height: 75vh;"
                >
                  <div
                    class="absolute top-0 w-full h-full bg-center bg-cover"
                    style='background-image: url("https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80");'
                  >
                    <span
                      id="blackOverlay"
                      class="absolute w-full h-full bg-black opacity-75"
                    ></span>
                  </div>
                  <div class="container relative mx-auto">
                    <div class="flex flex-wrap items-center">
                      <div class="w-full px-4 ml-auto mr-auto text-center lg:w-6/12">
                        <div class="pr-12">
                          <h1 class="text-5xl font-semibold text-white">
                            AQUÍ EMPIEZA TU HISTORIAL DE VENTAS.
                          </h1>
                          <p class="mt-4 text-lg text-gray-300">
                            Únete a la vibrante comunidad de CIFOPPOPP y empieza a ganar dinero con tus productos naturales.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div
                    class="absolute bottom-0 left-0 right-0 top-auto w-full overflow-hidden pointer-events-none"
                    style="height: 70px;"
                  >
                    <svg
                      class="absolute bottom-0 overflow-hidden"
                      xmlns="http://www.w3.org/2000/svg"
                      preserveAspectRatio="none"
                      version="1.1"
                      viewBox="0 0 2560 100"
                      x="0"
                      y="0"
                    >
                      <polygon
                        class="text-gray-300 fill-current"
                        points="2560 0 2560 100 0 100"
                      ></polygon>
                    </svg>
                  </div>
                </div>
                <section class="pb-20 -mt-24 bg-gray-300">
                  <div class="container px-4 mx-auto">
                    <div class="flex flex-wrap">
                      <div class="w-full px-4 pt-6 text-center lg:pt-12 md:w-4/12">
                        <div
                          class="relative flex flex-col w-full min-w-0 mb-8 break-words bg-white rounded-lg shadow-lg"
                        >
                          <div class="flex-auto px-4 py-5">
                            <div
                              class="inline-flex items-center justify-center w-12 h-12 p-3 mb-5 text-center text-white bg-red-400 rounded-full shadow-lg"
                            >
                              <i class="fas fa-award"></i>
                            </div>
                            <h6 class="text-xl font-semibold">PREMIO EXCELENCIA 2022</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                              CÁMARA DE COMERCIO DE SABADELL.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="w-full px-4 text-center md:w-4/12">
                        <div
                          class="relative flex flex-col w-full min-w-0 mb-8 break-words bg-white rounded-lg shadow-lg"
                        >
                          <div class="flex-auto px-4 py-5">
                            <div
                              class="inline-flex items-center justify-center w-12 h-12 p-3 mb-5 text-center text-white bg-blue-400 rounded-full shadow-lg"
                            >
                              <i class="fas fa-retweet"></i>
                            </div>
                            <h6 class="text-xl font-semibold">OFERTAS REALES DE GENTE REAL</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                              SIN BOOTS.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="w-full px-4 pt-6 text-center md:w-4/12">
                        <div
                          class="relative flex flex-col w-full min-w-0 mb-8 break-words bg-white rounded-lg shadow-lg"
                        >
                          <div class="flex-auto px-4 py-5">
                            <div
                              class="inline-flex items-center justify-center w-12 h-12 p-3 mb-5 text-center text-white bg-green-400 rounded-full shadow-lg"
                            >
                              <i class="fas fa-fingerprint"></i>
                            </div>
                            <h6 class="text-xl font-semibold">TRANSACCIONES 100% SEGURAS</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                              TANTO SI VENDES COMO SI COMPRAS TU TRANQUILIDAD ES LO PRIMERO!
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-wrap items-center mt-32">
                      <div class="w-full px-4 ml-auto mr-auto md:w-5/12">
                        <div
                          class="inline-flex items-center justify-center w-16 h-16 p-3 mb-6 text-center text-gray-600 bg-gray-100 rounded-full shadow-lg"
                        >
                          <i class="text-xl fas fa-user-friends"></i>
                        </div>
                        <h3 class="mb-2 text-3xl font-semibold leading-normal">
                          VENDER EN CIFOPPOPP ES UN PLACER
                        </h3>
                        <p
                          class="mt-4 mb-4 text-lg font-light leading-relaxed text-gray-700"
                        >
                          UN SITIO DONDE ADEMÁS HACER AMIGOS.
                        </p>
                        <p
                          class="mt-0 mb-4 text-lg font-light leading-relaxed text-gray-700"
                        >
                          PLANTILLA DE TAILWIND STARTER KIT
                        </p>
                        <a
                          href="https://www.creative-tim.com/learning-lab/tailwind-starter-kit#/presentation"
                          class="mt-8 font-bold text-gray-800"
                          >Check IT!!!</a
                        >
                      </div>
                      <div class="w-full px-4 ml-auto mr-auto md:w-4/12">
                        <div
                          class="relative flex flex-col w-full min-w-0 mb-6 break-words bg-pink-600 rounded-lg shadow-lg"
                        >
                          <img
                            alt="..."
                            src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1051&amp;q=80"
                            class="w-full align-middle rounded-t-lg"
                          />
                          <blockquote class="relative p-8 mb-4">
                            <svg
                              preserveAspectRatio="none"
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 583 95"
                              class="absolute left-0 block w-full"
                              style="height: 95px; top: -94px;"
                            >
                              <polygon
                                points="-30,95 583,95 583,65"
                                class="text-pink-600 fill-current"
                              ></polygon>
                            </svg>
                            <h4 class="text-xl font-bold text-white">
                              Top Customers Services
                            </h4>
                            <p class="mt-2 font-light text-white text-md">
                              Con tu cuenta Freemium podrás optar a bloquear ofertas y cerrar tratos ante que nadie.
                            </p>
                          </blockquote>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <section class="relative py-20">
                  <div
                    class="absolute top-0 left-0 right-0 bottom-auto w-full -mt-20 overflow-hidden pointer-events-none"
                    style="height: 80px;"
                  >
                    <svg
                      class="absolute bottom-0 overflow-hidden"
                      xmlns="http://www.w3.org/2000/svg"
                      preserveAspectRatio="none"
                      version="1.1"
                      viewBox="0 0 2560 100"
                      x="0"
                      y="0"
                    >
                      <polygon
                        class="text-white fill-current"
                        points="2560 0 2560 100 0 100"
                      ></polygon>
                    </svg>
                  </div>
                  <div class="container px-4 mx-auto">
                    <div class="flex flex-wrap items-center">
                      <div class="w-full px-4 ml-auto mr-auto md:w-4/12">
                        <img
                          alt="..."
                          class="max-w-full rounded-lg shadow-lg"
                          src="https://images.unsplash.com/photo-1555212697-194d092e3b8f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=634&amp;q=80"
                        />
                      </div>
                      <div class="w-full px-4 ml-auto mr-auto md:w-5/12">
                        <div class="md:pr-12">
                          <div
                            class="inline-flex items-center justify-center w-16 h-16 p-3 mb-6 text-center text-pink-600 bg-pink-300 rounded-full shadow-lg"
                          >
                            <i class="text-xl fas fa-rocket"></i>
                          </div>
                          <h3 class="text-3xl font-semibold">Comunidad en constante crecimiento</h3>
                          <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            Nuestro límite nos lo marcan cada día nuestros usuarios. Y para ellos el límite es el cielo así que ¡¡VOLAMOS!!
                          </p>
                          <ul class="mt-6 list-none">
                            <li class="py-2">
                              <div class="flex items-center">
                                <div>
                                  <span
                                    class="inline-block px-2 py-1 mr-3 text-xs font-semibold text-pink-600 uppercase bg-pink-200 rounded-full"
                                    ><i class="fas fa-fingerprint"></i
                                  ></span>
                                </div>
                                <div>
                                  <h4 class="text-gray-600">
                                    VERIFICACIÓN EN DOS PASOS
                                  </h4>
                                </div>
                              </div>
                            </li>
                            <li class="py-2">
                              <div class="flex items-center">
                                <div>
                                  <span
                                    class="inline-block px-2 py-1 mr-3 text-xs font-semibold text-pink-600 uppercase bg-pink-200 rounded-full"
                                    ><i class="fab fa-html5"></i
                                  ></span>
                                </div>
                                <div>
                                  <h4 class="text-gray-600">INCREIBLES OFERTAS</h4>
                                </div>
                              </div>
                            </li>
                            <li class="py-2">
                              <div class="flex items-center">
                                <div>
                                  <span
                                    class="inline-block px-2 py-1 mr-3 text-xs font-semibold text-pink-600 uppercase bg-pink-200 rounded-full"
                                    ><i class="far fa-paper-plane"></i
                                  ></span>
                                </div>
                                <div>
                                  <h4 class="text-gray-600">CHAT VERSION SOON</h4>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <section class="pt-20 pb-48">
                  <div class="container px-4 mx-auto">
                    <div class="flex flex-wrap justify-center mb-24 text-center">
                      <div class="w-full px-4 lg:w-6/12">
                        <h2 class="text-4xl font-semibold">Clientes satisfechos</h2>
                        <p class="m-4 text-lg leading-relaxed text-gray-600">
                          Opiniones reales sacadas de Google Maps.
                        </p>
                      </div>
                    </div>
                    <div class="flex flex-wrap">
                      <div class="w-full px-4 mb-12 md:w-6/12 lg:w-3/12 lg:mb-0">
                        <div class="px-6">
                          <img
                            alt="..."
                            src="./assets/img/team-1-800x800.jpg"
                            class="max-w-full mx-auto rounded-full shadow-lg"
                            style="max-width: 120px;"
                          />
                          <div class="pt-6 text-center">
                            <h5 class="text-xl font-bold">Ryan Tompson</h5>
                            <p class="mt-1 text-sm font-semibold text-gray-500 uppercase">
                              Granjero
                            </p>
                            <div class="mt-6">
                              <button
                                class="w-8 h-8 mb-1 mr-1 text-white bg-blue-400 rounded-full outline-none focus:outline-none"
                                type="button"
                              >
                                <i class="fab fa-twitter"></i></button
                              ><button
                                class="w-8 h-8 mb-1 mr-1 text-white bg-blue-600 rounded-full outline-none focus:outline-none"
                                type="button"
                              >
                                <i class="fab fa-facebook-f"></i></button
                              ><button
                                class="w-8 h-8 mb-1 mr-1 text-white bg-pink-500 rounded-full outline-none focus:outline-none"
                                type="button"
                              >
                                <i class="fab fa-dribbble"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="w-full px-4 mb-12 md:w-6/12 lg:w-3/12 lg:mb-0">
                        <div class="px-6">
                          <img
                            alt="..."
                            src="./assets/img/team-2-800x800.jpg"
                            class="max-w-full mx-auto rounded-full shadow-lg"
                            style="max-width: 120px;"
                          />
                          <div class="pt-6 text-center">
                            <h5 class="text-xl font-bold">Romina Hadid</h5>
                            <p class="mt-1 text-sm font-semibold text-gray-500 uppercase">
                              Cultivador de hortalizas
                            </p>
                            <div class="mt-6">
                              <button
                                class="w-8 h-8 mb-1 mr-1 text-white bg-red-600 rounded-full outline-none focus:outline-none"
                                type="button"
                              >
                                <i class="fab fa-google"></i></button
                              ><button
                                class="w-8 h-8 mb-1 mr-1 text-white bg-blue-600 rounded-full outline-none focus:outline-none"
                                type="button"
                              >
                                <i class="fab fa-facebook-f"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="w-full px-4 mb-12 md:w-6/12 lg:w-3/12 lg:mb-0">
                        <div class="px-6">
                          <img
                            alt="..."
                            src="./assets/img/team-3-800x800.jpg"
                            class="max-w-full mx-auto rounded-full shadow-lg"
                            style="max-width: 120px;"
                          />
                          <div class="pt-6 text-center">
                            <h5 class="text-xl font-bold">Alexa Smith</h5>
                            <p class="mt-1 text-sm font-semibold text-gray-500 uppercase">
                              Diseñador de Interiores de Gallineros
                            </p>
                            <div class="mt-6">
                              <button
                                class="w-8 h-8 mb-1 mr-1 text-white bg-red-600 rounded-full outline-none focus:outline-none"
                                type="button"
                              >
                                <i class="fab fa-google"></i></button
                              ><button
                                class="w-8 h-8 mb-1 mr-1 text-white bg-blue-400 rounded-full outline-none focus:outline-none"
                                type="button"
                              >
                                <i class="fab fa-twitter"></i></button
                              ><button
                                class="w-8 h-8 mb-1 mr-1 text-white bg-gray-800 rounded-full outline-none focus:outline-none"
                                type="button"
                              >
                                <i class="fab fa-instagram"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="w-full px-4 mb-12 md:w-6/12 lg:w-3/12 lg:mb-0">
                        <div class="px-6">
                          <img
                            alt="..."
                            src="./assets/img/team-4-470x470.png"
                            class="max-w-full mx-auto rounded-full shadow-lg"
                            style="max-width: 120px;"
                          />
                          <div class="pt-6 text-center">
                            <h5 class="text-xl font-bold">Jenna Kardi</h5>
                            <p class="mt-1 text-sm font-semibold text-gray-500 uppercase">
                              CEO de 'UnCerdoENCadaCasaPorNavidadYNoMeRefieroAMiCuñado'
                            </p>
                            <div class="mt-6">
                              <button
                                class="w-8 h-8 mb-1 mr-1 text-white bg-pink-500 rounded-full outline-none focus:outline-none"
                                type="button"
                              >
                                <i class="fab fa-dribbble"></i></button
                              ><button
                                class="w-8 h-8 mb-1 mr-1 text-white bg-red-600 rounded-full outline-none focus:outline-none"
                                type="button"
                              >
                                <i class="fab fa-google"></i></button
                              ><button
                                class="w-8 h-8 mb-1 mr-1 text-white bg-blue-400 rounded-full outline-none focus:outline-none"
                                type="button"
                              >
                                <i class="fab fa-twitter"></i></button
                              ><button
                                class="w-8 h-8 mb-1 mr-1 text-white bg-gray-800 rounded-full outline-none focus:outline-none"
                                type="button"
                              >
                                <i class="fab fa-instagram"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <section class="relative block pb-20 bg-gray-900">
                  <div
                    class="absolute top-0 left-0 right-0 bottom-auto w-full -mt-20 overflow-hidden pointer-events-none"
                    style="height: 80px;"
                  >
                    <svg
                      class="absolute bottom-0 overflow-hidden"
                      xmlns="http://www.w3.org/2000/svg"
                      preserveAspectRatio="none"
                      version="1.1"
                      viewBox="0 0 2560 100"
                      x="0"
                      y="0"
                    >
                      <polygon
                        class="text-gray-900 fill-current"
                        points="2560 0 2560 100 0 100"
                      ></polygon>
                    </svg>
                  </div>
                  <div class="container px-4 mx-auto lg:pt-24 lg:pb-64">
                    <div class="flex flex-wrap justify-center text-center">
                      <div class="w-full px-4 lg:w-6/12">
                        <h2 class="text-4xl font-semibold text-white">CONTACTO</h2>
                        <p class="mt-4 mb-4 text-lg leading-relaxed text-gray-500">
                          Estamos a tu disposición 24/7.
                        </p>
                      </div>
                    </div>
                    <div class="flex flex-wrap justify-center mt-12">
                      <div class="w-full px-4 text-center lg:w-3/12">
                        <div
                          class="inline-flex items-center justify-center w-12 h-12 p-3 text-gray-900 bg-white rounded-full shadow-lg"
                        >
                          <i class="text-xl fas fa-medal"></i>
                        </div>
                        <h6 class="mt-5 text-xl font-semibold text-white">
                          ¿Dudas?
                        </h6>
                        <p class="mt-2 mb-4 text-gray-500">
                          Some quick example text to build on the card title and make up
                          the bulk of the card's content.
                        </p>
                      </div>
                      <div class="w-full px-4 text-center lg:w-3/12">
                        <div
                          class="inline-flex items-center justify-center w-12 h-12 p-3 text-gray-900 bg-white rounded-full shadow-lg"
                        >
                          <i class="text-xl fas fa-poll"></i>
                        </div>
                        <h5 class="mt-5 text-xl font-semibold text-white">
                          ¿Sugerencias?
                        </h5>
                        <p class="mt-2 mb-4 text-gray-500">
                          Some quick example text to build on the card title and make up
                          the bulk of the card's content.
                        </p>
                      </div>
                      <div class="w-full px-4 text-center lg:w-3/12">
                        <div
                          class="inline-flex items-center justify-center w-12 h-12 p-3 text-gray-900 bg-white rounded-full shadow-lg"
                        >
                          <i class="text-xl fas fa-lightbulb"></i>
                        </div>
                        <h5 class="mt-5 text-xl font-semibold text-white">¿Algo no te gusta?</h5>
                        <p class="mt-2 mb-4 text-gray-500">
                          Some quick example text to build on the card title and make up
                          the bulk of the card's content.
                        </p>
                      </div>
                    </div>
                  </div>
                </section>
                <section class="relative block py-24 bg-gray-900 lg:pt-0">
                  <div class="container px-4 mx-auto">
                    <div class="flex flex-wrap justify-center -mt-48 lg:-mt-64">
                      <div class="w-full px-4 lg:w-6/12">
                        <div
                          class="relative flex flex-col w-full min-w-0 mb-6 break-words bg-gray-300 rounded-lg shadow-lg"
                        >
                          <div class="flex-auto p-5 lg:p-10">
                            <h4 class="text-2xl font-semibold">Un solo mail para todas tus consultas</h4>
                            <p class="mt-1 mb-4 leading-relaxed text-gray-600">
                              Rellena el formulario y nos pondremos en contacto contigo ASAP
                            </p>
                            <div class="relative w-full mt-8 mb-3">
                              <label
                                class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                                for="full-name"
                                >Full Name</label
                              ><input
                                type="text"
                                class="w-full px-3 py-3 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded shadow focus:outline-none focus:ring"
                                placeholder="Full Name"
                                style="transition: all 0.15s ease 0s;"
                              />
                            </div>
                            <div class="relative w-full mb-3">
                              <label
                                class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                                for="email"
                                >Email</label
                              ><input
                                type="email"
                                class="w-full px-3 py-3 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded shadow focus:outline-none focus:ring"
                                placeholder="Email"
                                style="transition: all 0.15s ease 0s;"
                              />
                            </div>
                            <div class="relative w-full mb-3">
                              <label
                                class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                                for="message"
                                >Message</label
                              ><textarea
                                rows="4"
                                cols="80"
                                class="w-full px-3 py-3 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded shadow focus:outline-none focus:ring"
                                placeholder="Type a message..."
                              ></textarea>
                            </div>
                            <div class="mt-6 text-center">
                              <button
                                class="px-6 py-3 mb-1 mr-1 text-sm font-bold text-white uppercase bg-gray-900 rounded shadow outline-none active:bg-gray-700 hover:shadow-lg focus:outline-none"
                                type="button"
                                style="transition: all 0.15s ease 0s;"
                              >
                                Send Message
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </main>
              <footer class="relative pt-8 pb-6 bg-gray-300">
                <div
                  class="absolute top-0 left-0 right-0 bottom-auto w-full -mt-20 overflow-hidden pointer-events-none"
                  style="height: 80px;"
                >
                  <svg
                    class="absolute bottom-0 overflow-hidden"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none"
                    version="1.1"
                    viewBox="0 0 2560 100"
                    x="0"
                    y="0"
                  >
                    <polygon
                      class="text-gray-300 fill-current"
                      points="2560 0 2560 100 0 100"
                    ></polygon>
                  </svg>
                </div>
                <div class="container px-4 mx-auto">
                  <div class="flex flex-wrap">
                    <div class="w-full px-4 lg:w-6/12">
                      <h4 class="text-3xl font-semibold">Let's keep in touch!</h4>
                      <h5 class="mt-0 mb-2 text-lg text-gray-700">
                        Find us on any of these platforms, we respond 1-2 business days.
                      </h5>
                      <div class="mt-6">
                        <button
                          class="items-center justify-center w-10 h-10 p-3 mr-2 font-normal text-blue-400 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none"
                          type="button"
                        >
                          <i class="flex fab fa-twitter"></i></button
                        ><button
                          class="items-center justify-center w-10 h-10 p-3 mr-2 font-normal text-blue-600 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none"
                          type="button"
                        >
                          <i class="flex fab fa-facebook-square"></i></button
                        ><button
                          class="items-center justify-center w-10 h-10 p-3 mr-2 font-normal text-pink-400 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none"
                          type="button"
                        >
                          <i class="flex fab fa-dribbble"></i></button
                        ><button
                          class="items-center justify-center w-10 h-10 p-3 mr-2 font-normal text-gray-900 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none"
                          type="button"
                        >
                          <i class="flex fab fa-github"></i>
                        </button>
                      </div>
                    </div>
                    <div class="w-full px-4 lg:w-6/12">
                      <div class="flex flex-wrap mb-6 items-top">
                        <div class="w-full px-4 ml-auto lg:w-4/12">
                          <span
                            class="block mb-2 text-sm font-semibold text-gray-600 uppercase"
                            >Useful Links</span
                          >
                          <ul class="list-unstyled">
                            <li>
                              <a
                                class="block pb-2 text-sm font-semibold text-gray-700 hover:text-gray-900"
                                href="https://www.creative-tim.com/presentation"
                                >About Us</a
                              >
                            </li>
                            <li>
                              <a
                                class="block pb-2 text-sm font-semibold text-gray-700 hover:text-gray-900"
                                href="https://blog.creative-tim.com"
                                >Blog</a
                              >
                            </li>
                            <li>
                              <a
                                class="block pb-2 text-sm font-semibold text-gray-700 hover:text-gray-900"
                                href="https://www.github.com/creativetimofficial"
                                >Github</a
                              >
                            </li>
                            <li>
                              <a
                                class="block pb-2 text-sm font-semibold text-gray-700 hover:text-gray-900"
                                href="https://www.creative-tim.com/bootstrap-themes/free"
                                >Free Products</a
                              >
                            </li>
                          </ul>
                        </div>
                        <div class="w-full px-4 lg:w-4/12">
                          <span
                            class="block mb-2 text-sm font-semibold text-gray-600 uppercase"
                            >Other Resources</span
                          >
                          <ul class="list-unstyled">
                            <li>
                              <a
                                class="block pb-2 text-sm font-semibold text-gray-700 hover:text-gray-900"
                                href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md"
                                >MIT License</a
                              >
                            </li>
                            <li>
                              <a
                                class="block pb-2 text-sm font-semibold text-gray-700 hover:text-gray-900"
                                href="https://creative-tim.com/terms"
                                >Terms &amp; Conditions</a
                              >
                            </li>
                            <li>
                              <a
                                class="block pb-2 text-sm font-semibold text-gray-700 hover:text-gray-900"
                                href="https://creative-tim.com/privacy"
                                >Privacy Policy</a
                              >
                            </li>
                            <li>
                              <a
                                class="block pb-2 text-sm font-semibold text-gray-700 hover:text-gray-900"
                                href="https://creative-tim.com/contact-us"
                                >Contact Us</a
                              >
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-6 border-gray-400" />
                  <div
                    class="flex flex-wrap items-center justify-center md:justify-between"
                  >
                    <div class="w-full px-4 mx-auto text-center md:w-4/12">
                      <div class="py-1 text-sm font-semibold text-gray-600">
                        Copyright © 2019 Tailwind Starter Kit by
                        <a
                          href="https://www.creative-tim.com"
                          class="text-gray-600 hover:text-gray-900"
                          >Creative Tim</a
                        >.
                      </div>
                    </div>
                  </div>
                </div>
              </footer>
            </body>
            <script>
              function toggleNavbar(collapseID) {
                document.getElementById(collapseID).classList.toggle("hidden");
                document.getElementById(collapseID).classList.toggle("block");
              }
            </script>
        {{-- </div> --}}
@endsection
