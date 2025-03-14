<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XAMPP Dashboard</title>
    <link href="css/output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#FF5722',
                            foreground: '#ffffff',
                        },
                        secondary: {
                            DEFAULT: '#2C3E50',
                            foreground: '#ffffff',
                        },
                        accent: {
                            DEFAULT: '#3498DB',
                            foreground: '#ffffff',
                        },
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <svg class="h-8 w-8 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                            <path d="M2 17l10 5 10-5"></path>
                            <path d="M2 12l10 5 10-5"></path>
                        </svg>
                        <span class="ml-2 text-2xl font-bold text-secondary">XAMPP Dashboard</span>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        <?php echo 'PHP ' . phpversion(); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Server Information -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-secondary">Server Information</h3>
                    <div class="mt-4 space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Server Software:</span>
                            <span class="font-medium max-w-xs truncate"><?php echo $_SERVER['SERVER_SOFTWARE']; ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Document Root:</span>
                            <span class="font-medium"><?php echo $_SERVER['DOCUMENT_ROOT']; ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Server Name:</span>
                            <span class="font-medium"><?php echo $_SERVER['SERVER_NAME']; ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Server Port:</span>
                            <span class="font-medium"><?php echo $_SERVER['SERVER_PORT']; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PHP Information -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-secondary">PHP Information</h3>
                    <div class="mt-4 space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-500">PHP Version:</span>
                            <span class="font-medium"><?php echo phpversion(); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Loaded Extensions:</span>
                            <span class="font-medium"><?php echo count(get_loaded_extensions()); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Max Upload Size:</span>
                            <span class="font-medium"><?php echo ini_get('upload_max_filesize'); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Max Execution Time:</span>
                            <span class="font-medium"><?php echo ini_get('max_execution_time'); ?> seconds</span>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-4 sm:px-6">
                    <a href="/phpinfo.php" class="text-accent hover:text-accent-700 font-medium">View Full PHP Info →</a>
                </div>
            </div>

            <!-- Database Information -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-secondary">Database Information</h3>
                    <div class="mt-4 space-y-2">
                        <?php
                        $mysql_running = false;
                        $connection = @mysqli_connect('localhost', 'root', '');
                        if ($connection) {
                            $mysql_running = true;
                            $mysql_version = mysqli_get_server_info($connection);
                            mysqli_close($connection);
                        }
                        ?>
                        <div class="flex justify-between">
                            <span class="text-gray-500">MySQL Status:</span>
                            <span class="font-medium <?php echo $mysql_running ? 'text-green-600' : 'text-red-600'; ?>">
                                <?php echo $mysql_running ? 'Running' : 'Not Running'; ?>
                            </span>
                        </div>
                        <?php if ($mysql_running): ?>
                        <div class="flex justify-between">
                            <span class="text-gray-500">MySQL Version:</span>
                            <span class="font-medium"><?php echo $mysql_version; ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-4 sm:px-6">
                    <a href="/phpmyadmin/" class="text-accent hover:text-accent-700 font-medium">Open phpMyAdmin →</a>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold text-secondary mb-4">Quick Links</h2>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <a href="/phpmyadmin/" class="bg-white overflow-hidden shadow rounded-lg hover:shadow-md transition-shadow duration-300">
                    <div class="px-4 py-5 sm:p-6 flex items-center">
                        <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2 1 3 3 3h10c2 0 3-1 3-3V7c0-2-1-3-3-3H7C5 4 4 5 4 7z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-secondary">phpMyAdmin</h3>
                            <p class="text-sm text-gray-500">Database Management</p>
                        </div>
                    </div>
                </a>

                <a href="/dashboard/" class="bg-white overflow-hidden shadow rounded-lg hover:shadow-md transition-shadow duration-300">
                    <div class="px-4 py-5 sm:p-6 flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-secondary">XAMPP Dashboard</h3>
                            <p class="text-sm text-gray-500">Control Panel</p>
                        </div>
                    </div>
                </a>

                <a href="/webalizer/" class="bg-white overflow-hidden shadow rounded-lg hover:shadow-md transition-shadow duration-300">
                    <div class="px-4 py-5 sm:p-6 flex items-center">
                        <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-secondary">Webalizer</h3>
                            <p class="text-sm text-gray-500">Web Statistics</p>
                        </div>
                    </div>
                </a>

                <a href="/phpinfo.php" class="bg-white overflow-hidden shadow rounded-lg hover:shadow-md transition-shadow duration-300">
                    <div class="px-4 py-5 sm:p-6 flex items-center">
                        <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-secondary">PHP Info</h3>
                            <p class="text-sm text-gray-500">PHP Configuration</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Project List -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold text-secondary mb-4">Your Projects</h2>
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <ul class="divide-y divide-gray-200">
                    <?php
                    $projects = array_filter(glob($_SERVER['DOCUMENT_ROOT'] . '/*'), 'is_dir');
                    $exclude = array(
                        $_SERVER['DOCUMENT_ROOT'] . '/dashboard',
                        $_SERVER['DOCUMENT_ROOT'] . '/phpmyadmin',
                        $_SERVER['DOCUMENT_ROOT'] . '/webalizer',
                        $_SERVER['DOCUMENT_ROOT'] . '/img',
                        $_SERVER['DOCUMENT_ROOT'] . '/examples',
                        $_SERVER['DOCUMENT_ROOT'] . '/css',
                        $_SERVER['DOCUMENT_ROOT'] . '/node_modules',
                    );
                    $projects = array_diff($projects, $exclude);
                    
                    if (count($projects) > 0) {
                        foreach ($projects as $project) {
                            $name = basename($project);
                            $url = '/' . $name;
                            echo '<li>';
                            echo '<a href="' . $url . '" class="block hover:bg-gray-50">';
                            echo '<div class="px-4 py-4 sm:px-6">';
                            echo '<div class="flex items-center justify-between">';
                            echo '<p class="text-sm font-medium text-accent truncate">' . $name . '</p>';
                            echo '<div class="ml-2 flex-shrink-0 flex">';
                            echo '<p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="mt-2 sm:flex sm:justify-between">';
                            echo '<div class="sm:flex">';
                            echo '<p class="flex items-center text-sm text-gray-500">';
                            echo '<svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">';
                            echo '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />';
                            echo '</svg>';
                            echo 'Last modified: ' . date("F d, Y H:i", filemtime($project));
                            echo '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</a>';
                            echo '</li>';
                        }
                    } else {
                        echo '<li class="px-4 py-5 sm:px-6 text-center text-gray-500">No projects found. Create a new directory in htdocs to get started.</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

        <!-- System Status -->
        <div class="mt-8 bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-secondary">System Status</h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500">
                    <p>Monitor the status of your XAMPP services</p>
                </div>
                <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    <?php
                    // Check Apache status
                    $apache_running = (stripos($_SERVER['SERVER_SOFTWARE'], 'Apache') !== false);
                    
                    // Check MySQL status (already done above)
                    
                    // Check FileZilla status (if port 21 is open)
                    $filezilla_running = @fsockopen('localhost', 21, $errno, $errstr, 1);
                    if ($filezilla_running) fclose($filezilla_running);
                    
                    // Check Mercury Mail (if port 25 is open)
                    $mercury_running = @fsockopen('localhost', 25, $errno, $errstr, 1);
                    if ($mercury_running) fclose($mercury_running);
                    
                    $services = [
                        [
                            'name' => 'Apache',
                            'running' => $apache_running,
                            'color' => 'red',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />'
                        ],
                        [
                            'name' => 'MySQL',
                            'running' => $mysql_running,
                            'color' => 'blue',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2 1 3 3 3h10c2 0 3-1 3-3V7c0-2-1-3-3-3H7C5 4 4 5 4 7z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6" />'
                        ],
                        [
                            'name' => 'FileZilla',
                            'running' => $filezilla_running,
                            'color' => 'green',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />'
                        ],
                        [
                            'name' => 'Mercury',
                            'running' => $mercury_running,
                            'color' => 'purple',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />'
                        ]
                    ];
                    
                    foreach ($services as $service) {
                        echo '<div class="bg-white overflow-hidden shadow rounded-md">';
                        echo '<div class="px-4 py-5 sm:p-6">';
                        echo '<div class="flex items-center">';
                        echo '<div class="flex-shrink-0 bg-' . $service['color'] . '-500 rounded-md p-3">';
                        echo '<svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">';
                        echo $service['icon'];
                        echo '</svg>';
                        echo '</div>';
                        echo '<div class="ml-5 w-0 flex-1">';
                        echo '<dt class="text-sm font-medium text-gray-500 truncate">' . $service['name'] . '</dt>';
                        echo '<dd class="flex items-center">';
                        if ($service['running']) {
                            echo '<div class="flex items-center text-green-600">';
                            echo '<svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">';
                            echo '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />';
                            echo '</svg>';
                            echo '<span class="ml-2">Running</span>';
                            echo '</div>';
                        } else {
                            echo '<div class="flex items-center text-red-600">';
                            echo '<svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">';
                            echo '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />';
                            echo '</svg>';
                            echo '<span class="ml-2">Stopped</span>';
                            echo '</div>';
                        }
                        echo '</dd>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Development Tools -->
        <div class="mt-8 bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-secondary">Development Tools</h3>
                <div class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <a href="https://validator.w3.org/" target="_blank" class="bg-white overflow-hidden shadow rounded-lg border border-gray-200 hover:shadow-md transition-shadow duration-300">
                        <div class="px-4 py-5 sm:p-6 flex items-center">
                            <div class="flex-shrink-0 bg-orange-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-secondary">HTML Validator</h3>
                                <p class="text-sm text-gray-500">Validate your HTML code</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="https://jigsaw.w3.org/css-validator/" target="_blank" class="bg-white overflow-hidden shadow rounded-lg border border-gray-200 hover:shadow-md transition-shadow duration-300">
                        <div class="px-4 py-5 sm:p-6 flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-secondary">CSS Validator</h3>
                                <p class="text-sm text-gray-500">Validate your CSS code</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="https://www.phpliveregex.com/" target="_blank" class="bg-white overflow-hidden shadow rounded-lg border border-gray-200 hover:shadow-md transition-shadow duration-300">
                        <div class="px-4 py-5 sm:p-6 flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-secondary">PHP RegEx Tester</h3>
                                <p class="text-sm text-gray-500">Test regular expressions</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="https://jsonlint.com/" target="_blank" class="bg-white overflow-hidden shadow rounded-lg border border-gray-200 hover:shadow-md transition-shadow duration-300">
                        <div class="px-4 py-5 sm:p-6 flex items-center">
                            <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2 1 3 3 3h10c2 0 3-1 3-3V7c0-2-1-3-3-3H7C5 4 4 5 4 7z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-secondary">JSON Validator</h3>
                                <p class="text-sm text-gray-500">Validate and format JSON</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="https://caniuse.com/" target="_blank" class="bg-white overflow-hidden shadow rounded-lg border border-gray-200 hover:shadow-md transition-shadow duration-300">
                        <div class="px-4 py-5 sm:p-6 flex items-center">
                            <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-secondary">Can I Use</h3>
                                <p class="text-sm text-gray-500">Browser compatibility tables</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="https://tailwindcss.com/docs" target="_blank" class="bg-white overflow-hidden shadow rounded-lg border border-gray-200 hover:shadow-md transition-shadow duration-300">
                        <div class="px-4 py-5 sm:p-6 flex items-center">
                            <div class="flex-shrink-0 bg-teal-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-secondary">Tailwind CSS Docs</h3>
                                <p class="text-sm text-gray-500">Tailwind CSS documentation</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-white mt-12">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-500 text-sm">
                XAMPP Dashboard • PHP Version: <?php echo phpversion(); ?> • 
                Server: <?php echo $_SERVER['SERVER_SOFTWARE']; ?> • 
                <?php echo date('Y'); ?>
            </p>
        </div>
    </footer>

    <!-- Create phpinfo.php file if it doesn't exist -->
    <?php
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/phpinfo.php')) {
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/phpinfo.php', '<?php phpinfo(); ?>');
    }
    ?>
</body>
</html>

