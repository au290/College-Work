pluginManagement {
    repositories {
        // It's best to not restrict content in plugin management
        // to allow repositories like gradlePluginPortal to resolve all necessary plugins.
        google()
        mavenCentral()
        gradlePluginPortal()
    }
}

dependencyResolutionManagement {
    repositoriesMode.set(RepositoriesMode.FAIL_ON_PROJECT_REPOS)
    repositories {
        google()
        mavenCentral()
    }
}

rootProject.name = "MyAPI-Test"
include(":app")
