<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CarteFidelysCommand extends Command
{

    protected function configure(): void
    {
        $this
            ->setDescription('Gestion Des Cartes Fidelys') ;
    }

 
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
       $mouvements = $this->MouvementRepository->findAllMouvement;
       foreach ($mouvements as $mouvement){
           $mouvement->DateExpiration();
       }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
