const config = {
        container: "#custom-colored",
        nodeAlign: "BOTTOM",
        connebasrs: {
            type: 'bCurve'
        },
        node: {
            HTMLclass: 'familyNode'
        },
        hideRootNode: true,
        siblingSeparation: -10,
    },
    root = {
        pseudo: true
    },
    gj = {
        parent: root,
        text: {name: "GJ"},
        image: "/img/avatar-gj.svg",
        link: {
            href: "/list/GJ"
        },
        HTMLclass: 'shadow bg-sky-500',
    },
    gerda = {
        parent: root,
        text: {name: "Gerda"},
        image: "/img/avatar-gerda.svg",
        link: {
            href: "/list/Gerda"
        },
        HTMLclass: 'partner shadow bg-rose-400',
    },

    gezin1 = {
        pseudo: true,
        parent: gj,
    },
    gezin2 = {
        pseudo: true,
        parent: gj,
    },
    gezin3 = {
        pseudo: true,
        parent: gj,
    },

    bas = {
        parent: gezin1,
        text: {name: 'Bas'},
        image: "/img/avatar-bas.svg",
        link: {
            href: "/list/Bas"
        },
        HTMLclass: 'shadow bg-green-500',
        stackChildren: true,
    },
    dorien = {
        parent: gezin1,
        text: {name: 'Dorien'},
        image: "/img/avatar-dorien.svg",
        link: {
            href: "/list/Dorien"
        },
        HTMLclass: 'partner shadow bg-fuchsia-400',
        stackChildren: true,
    },
    daan = {
        parent: gezin2,
        text: {name: 'Daan'},
        image: "/img/avatar-daan.svg",
        link: {
            href: "/list/Daan"
        },
        HTMLclass: 'shadow bg-green-500',
        stackChildren: true,
    },
    leanne = {
        parent: gezin2,
        text: {name: 'Leanne'},
        image: "/img/avatar-leanne.svg",
        link: {
            href: "/list/Leanne"
        },
        HTMLclass: 'partner shadow bg-fuchsia-400',
    },
    hugo = {
        parent: gezin3,
        text: {name: 'Hugo'},
        image: "/img/avatar-hugo.svg",
        link: {
            href: "/list/Hugo"
        },
        HTMLclass: 'shadow bg-green-500',
        stackChildren: true,
    },
    lieselot = {
        parent: gezin3,
        text: {name: 'Lieselot'},
        image: "/img/avatar-lieselot.svg",
        link: {
            href: "/list/Lieselot"
        },
        HTMLclass: 'partner shadow bg-fuchsia-400',
    },

    // Driehuis
    thijs = {
        parent: bas,
        text: {name: 'Thijs'},
        image: "/img/avatar-thijs.svg",
        link: {
            href: "/list/Thijs"
        },
        HTMLclass: 'shadow bg-emerald-500',
    },
    bob = {
        parent: bas,
        text: {name: 'Bob'},
        image: "/img/avatar-bob.svg",
        link: {
            href: "/list/Bob"
        },
        HTMLclass: 'shadow bg-emerald-500',
    },
    daantje = {
        parent: bas,
        text: {name: 'Daantje'},
        image: "/img/avatar-daantje.svg",
        link: {
            href: "/list/Daantje"
        },
        HTMLclass: 'shadow bg-emerald-500',
    },
    sepp = {
        parent: bas,
        text: {name: 'Sepp'},
        image: "/img/avatar-sepp.svg",
        link: {
            href: "/list/Sepp"
        },
        HTMLclass: 'shadow bg-emerald-500',
    },

    // Den Haag
    noortje = {
        parent: daan,
        text: { name: 'Noortje' },
        image: "/img/avatar-noortje.svg",
        link: {
            href: "/list/Noortje"
        },
        HTMLclass: 'shadow bg-pink-400',
    },
    abel = {
        parent: daan,
        text: { name: 'Abel' },
        image: "/img/avatar-abel.svg",
        link: {
            href: "/list/Abel"
        },
        HTMLclass: 'shadow bg-blue-500',
    },
    elena = {
        parent: daan,
        text: { name: 'Elena' },
        image: "/img/avatar-elena.svg",
        link: {
            href: "/list/Elena"
        },
        HTMLclass: 'shadow bg-pink-400',
    },

    // Vlaardingen
    alissa = {
        parent: hugo,
        text: { name: 'Alissa' },
        image: "/img/avatar-alissa.svg",
        link: {
            href: "/list/Alissa"
        },
        HTMLclass: 'shadow bg-pink-400',
    },
    frummelien = {
        parent: hugo,
        text: { name: 'Frummelien' },
        image: "/img/avatar-frummelien.svg",
        link: {
            href: "/list/Frummelien"
        },
        HTMLclass: 'shadow bg-pink-400',
    },


    chart_config = [
        config,
        root, gj, gerda,
        gezin1, bas, dorien,
        gezin2, daan, leanne,
        gezin3, hugo, lieselot,
        thijs, bob, daantje, sepp,
        noortje, abel, elena,
        alissa, frummelien,
    ];


