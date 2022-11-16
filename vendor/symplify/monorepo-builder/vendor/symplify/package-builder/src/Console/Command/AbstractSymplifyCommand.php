<?php

declare (strict_types=1);
namespace MonorepoBuilder202211\Symplify\PackageBuilder\Console\Command;

use MonorepoBuilder202211\Symfony\Component\Console\Command\Command;
use MonorepoBuilder202211\Symfony\Component\Console\Input\InputOption;
use MonorepoBuilder202211\Symfony\Component\Console\Style\SymfonyStyle;
use MonorepoBuilder202211\Symfony\Contracts\Service\Attribute\Required;
use MonorepoBuilder202211\Symplify\PackageBuilder\ValueObject\Option;
use MonorepoBuilder202211\Symplify\SmartFileSystem\FileSystemGuard;
use MonorepoBuilder202211\Symplify\SmartFileSystem\Finder\SmartFinder;
use MonorepoBuilder202211\Symplify\SmartFileSystem\SmartFileSystem;
abstract class AbstractSymplifyCommand extends Command
{
    /**
     * @var \Symfony\Component\Console\Style\SymfonyStyle
     */
    protected $symfonyStyle;
    /**
     * @var \Symplify\SmartFileSystem\SmartFileSystem
     */
    protected $smartFileSystem;
    /**
     * @var \Symplify\SmartFileSystem\Finder\SmartFinder
     */
    protected $smartFinder;
    /**
     * @var \Symplify\SmartFileSystem\FileSystemGuard
     */
    protected $fileSystemGuard;
    public function __construct()
    {
        parent::__construct();
        $this->addOption(Option::CONFIG, 'c', InputOption::VALUE_REQUIRED, 'Path to config file');
    }
    /**
     * @required
     */
    public function autowire(SymfonyStyle $symfonyStyle, SmartFileSystem $smartFileSystem, SmartFinder $smartFinder, FileSystemGuard $fileSystemGuard) : void
    {
        $this->symfonyStyle = $symfonyStyle;
        $this->smartFileSystem = $smartFileSystem;
        $this->smartFinder = $smartFinder;
        $this->fileSystemGuard = $fileSystemGuard;
    }
}