<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16.04.20
 * Time: 12:30
 */

namespace App\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use App\Service\CopyJsonData;

class CopyDataCommand extends Command
{

    protected static $defaultName = 'app:copy-data';

    protected function configure()
    {
        $this
            ->setDescription('Copy data from json file')
            ->addArgument('sheetId', InputArgument::REQUIRED, 'The sheet\'s id')
            ->addOption('format', null, InputOption::VALUE_REQUIRED, 'The output format', 'text');
    }


    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws \Google_Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try{
            $sheetId = $input->getArgument('sheetId');

            $copyJsonData = new CopyJsonData();
            $copyJsonData->copyDataFromJson($sheetId);

            $message = $copyJsonData->getMessage();


        }catch (\Exception $e){
            $message = $e->getMessage();
        }finally{
            $output->writeln($message);
        }


        return 1;
    }









}