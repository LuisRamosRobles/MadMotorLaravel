<header
    id="landing-header"
    class="py-3 px-10 flex items-center fixed top-0 w-full justify-between z-40 text-white"
>
    <div class="flex flex-grow basis-0">
        <a href="./">

        </a>
    </div>

    <nav class="hidden xl:block sm:hidden">
        <ul
            class="flex text-sm [&>li>a]:transition-colors [&>li>a]:duration-500 [&>li>a]:text-current [&>li>a]:font-medium [&>li>a]:inline-block [&>li>a]:px-4 [&>li>a]:py-2"
        >
            <li><a href="#">Vehiculos</a></li>
            <li><a href="#">Piezas</a></li>

        </ul>
    </nav>

    <nav class="flex flex-grow justify-end basis-0">
        <ul
            class="flex text-sm [&>li>a]:transition-colors [&>li>a]:duration-500 [&>li>a]:text-current [&>li>a]:font-medium [&>li>a]:inline-block [&>li>a]:px-4 [&>li>a]:py-2"
        >
            <li class="hidden xl:block sm:hidden"><a href="#">Carrito</a></li>
            <li class="hidden xl:block sm:hidden"><a href="#">Cuenta</a></li>
            <li><a href="#">Menú</a></li>
        </ul>
    </nav>

    <div
        id="menu-backdrop"
        class={`
        absolute bg-black
    /5 backdrop-blur-lg rounded
    translate-x-[var(--left)] translate-y-[var(--top)]
    left-0 top-0
    w-[var(--width)] h-[var(--height)]
    transition-all duration-500
    ease-in-out opacity-0 -z-10
    `}
    >
    </div>
</header>

<script>
    const listItem = document.querySelectorAll("#landing-header li")
    const menuBackDrop = document.querySelector("#menu-backdrop")
    as
    HTMLElement

    listItem.forEach((item) => {
        item.addEventListener("mouseenter", () => {
            const {left, top, width, height} = item.getBoundingClientRect()

            menuBackDrop.style.setProperty("--left", `${left}px`)
            menuBackDrop.style.setProperty("--top", `${top}px`)
            menuBackDrop.style.setProperty("--width", `${width}px`)
            menuBackDrop.style.setProperty("--height", `${height}px`)

            menuBackDrop.style.opacity = "1"
            menuBackDrop.style.visibility = "visible"
        })

        item.addEventListener("mouseleave", () => {
            menuBackDrop.style.opacity = "0"
            menuBackDrop.style.visibility = "hidden"
        })
    })
</script>

<script>
    const headerEl = document.querySelector("#landing-header")
    as
    HTMLElement

    const observerOptions = {
        root: null,
        rootMargin: "0px", // en cuanto se vea el elemento
        threshold: 0.9, // porcentaje de visibilidad
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            const {isIntersecting} = entry
            if (isIntersecting) {
                const color = entry.target.getAttribute("data-header-color")
                headerEl.style.color = color
            }
        })
    }, observerOptions)

    const sectionElements = document.querySelectorAll(".landing-section")
    sectionElements.forEach((section) => observer.observe(section))
</script>
